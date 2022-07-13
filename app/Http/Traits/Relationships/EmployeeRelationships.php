<?php

namespace App\Http\Traits\Relationships;

use App\Models\Afp;
use App\Models\Ars;
use App\Models\Vip;
use App\Models\Card;
use App\Models\Hour;
use App\Models\Site;
use App\Models\Punch;
use App\Models\Shift;
use App\Models\Gender;
use App\Models\Address;
use App\Models\Marital;
use App\Models\Process;
use App\Models\Project;
use App\Models\Position;
use App\Models\Schedule;
use App\Models\LoginName;
use App\Models\Universal;
use App\Models\Attendance;
use App\Models\Department;
use App\Models\Supervisor;
use App\Models\BankAccount;
use App\Models\Nationality;
use App\Models\Performance;
use App\Models\Termination;
use App\Models\OvernightHour;
use App\Models\SocialSecurity;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait EmployeeRelationships
{
    public function address()
    {
        return $this->hasOne(Address::class);
    }

    public function ars()
    {
        return $this->belongsTo(Ars::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function afp()
    {
        return $this->belongsTo(Afp::class);
    }

    public function bankAccount()
    {
        return $this->hasOne(BankAccount::class);
    }

    public function department()
    {
        return $this->hasManyThrough(Department::class, Position::class);
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id');
    }

    public function nationality()
    {
        return $this->belongsTo(Nationality::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function marital()
    {
        return $this->belongsTo(Marital::class, 'marital_id');
    }

    public function performances()
    {
        return $this->hasMany(Performance::class);
    }

    public function productions()
    {
        return $this->hasMany(Production::class);
    }

    public function hours()
    {
        return $this->hasMany(Hour::class);
    }

    public function loginNames()
    {
        return $this->hasMany(LoginName::class)
            ->orderBy('login');
    }

    public function card()
    {
        return $this->hasOne(Card::class);
    }

    public function punch()
    {
        return $this->hasOne(Punch::class);
    }

    public function termination()
    {
        return $this->hasOne(Termination::class);
    }

    /**
     * An employee can have one shift.
     *
     * @return [relationship] [The shift belonging to the current employee]
     */
    public function shift()
    {
        return $this->hasMany(Shift::class);
    }

    /**
     * An employee can have one schedule.
     *
     * @return [relationship] [The schedule belonging to the current employee]
     */
    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function supervisor()
    {
        return $this->belongsTo(Supervisor::class);
    }

    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    /**
     * The processes that belong to the EmployeeRelationships
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function processes(): BelongsToMany
    {
        return $this->belongsToMany(Process::class)->withTimestamps();
    }

    public function socialSecurity()
    {
        return $this->hasOne(SocialSecurity::class);
    }

    public function overnightHours()
    {
        return $this->hasMany(OvernightHour::class);
    }

    public function universal()
    {
        return $this->hasOne(Universal::class);
    }

    public function vip()
    {
        return $this->hasOne(Vip::class);
    }
}
