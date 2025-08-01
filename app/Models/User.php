<?php

namespace App\Models;

use App\Http\Traits\Accessors\UserAccessors;
use App\Http\Traits\Mutators\UserMutators;
use App\Http\Traits\Relationships\UserRelationships;
use App\Mail\NewUserCreated;
use App\Mail\UpdatedPassword;
use App\Traits\Trackable;
use Dainsys\Support\Traits\HasSupportTickets;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements CanResetPassword
{
    use HasApiTokens;
    use HasRoles;
    use HasSupportTickets;
    use \Illuminate\Database\Eloquent\Factories\HasFactory;
    use Notifiable;
    use SoftDeletes;
    use Trackable;
    use UserAccessors;
    use UserMutators;
    use UserRelationships;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'is_active',
        'is_admin',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::addGlobalScope('active', function(Builder $builder) {
    //         $builder->where('is_active', '=', 1);
    //     });
    // }

    public function routeNotificationForVonage(Notification $notification): string
    {
        return config('vonage.sms_from');
    }

    public function owns($model)
    {
        return $this->id === $model->user_id;
    }

    public function userHasProfileOrCreate()
    {
        if (auth()->check()) {
            if (auth()->user()->profile()->exists()) {
                return $this->profile;
            }
        }

        return false;
    }

    /**
     * Check if the authenticate user has a session open
     *
     * @return void
     */
    protected function isLoggedIn(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(get: fn () => $this->login()
            ->where(['logged_out_at' => null])
            ->count() > 0);
    }

    public function isOnline()
    {
        if ($this->is_logged_in || Cache::has('online-user-'.$this->id)) {
            return true;
        }

        return false;
    }

    public function createUser($request)
    {
        $new_password = Str::random(15);

        $user = $this->create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($new_password),
            'is_active' => $request->is_active ?? true,
            'is_admin' => $request->is_admin ?? false,
        ]);

        $user->roles()->sync((array) $request->input('roles'));

        if ($request->notify) {
            Mail::send(new NewUserCreated($user, $new_password));
        }

        return $new_password;
    }

    public function updateUser($request)
    {
        abort_if($this->id === auth()->user()->id && $request->is_active === 0, 401, 'You cant inactivate Your self. No changes made.');

        abort_if($this->id === auth()->user()->id && $this->is_admin === 0 && $request->is_admin === 1, 401, 'You cant set your self as Admin. No changes made.');

        $this->update($request->all());

        $this->roles()->sync((array) $request->input('roles'));
    }

    public function forceChangePassword($request)
    {
        abort_if($this->id === auth()->user()->id && $request->is_active === 0, 401, 'You cant inactivate Your self. No changes made.');

        abort_if($this->id === auth()->user()->id && $this->is_admin === 0 && $request->is_admin === 1, 401, 'You cant set your self as Admin. No changes made.');

        $new_password = Str::random(15);

        $this->update(['password' => Hash::make($new_password)]);

        if ($request->notify) {
            Mail::send(new UpdatedPassword($this, $new_password));
        }

        return $new_password;
    }

    public function isAdmin()
    {
        return $this->is_admin === true || $this->hasAnyRole('admin', 'Admin', 'Administrador', 'administrador');
    }

    /**
     * Open a new login session for the current user.
     *
     * @return void
     */
    public function createLoginSession()
    {
        $this->login()->create([
            'logged_in_at' => now(),
        ]);
    }

    /**
     * Close all open sessions for the current user.
     *
     * @return void
     */
    public function closeLoginSessions()
    {
        $this->openSessions()
            ->each->update(['logged_out_at' => now()]);
    }

    /**
     * Return a collection of all sessions open for the current user.
     */
    public function openSessions(): Collection
    {
        return $this->login()
            ->orderBy('logged_out_at', 'DESC')
            ->where(['logged_out_at' => null])
            ->get();
    }

    /**
     * Return user last open session.
     *
     * @return void
     */
    public function lastOpenSession()
    {
        return $this->login()
            ->orderBy('logged_out_at', 'DESC')
            ->where(['logged_out_at' => null])
            ->first();
    }
}
