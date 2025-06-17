<?php

namespace App\Http\Traits\Relationships;

use App\Models\Attendance;
use App\Models\Contact;
use App\Models\Message;
use App\Models\Password;
use App\Models\Profile;
use App\Models\Supervisor;
use App\Models\Task;
use App\Models\UserLogin;
use App\Models\UserSetting;

trait UserRelationships
{
    /**
     * A user can have one profile
     *
     * @return relationship
     */
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    /**
     * A User can have many tasks
     *
     * @return relationship
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function passwords()
    {
        return $this->hasMany(Password::class);
    }

    /**
     * A User can have one settings
     *
     * @return relationship
     */
    public function settings()
    {
        return $this->hasOne(UserSetting::class);
    }

    /**
     * A user can have many messages
     *
     * @return relation
     */
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    /**
     * A user has many contacts
     *
     * @return relationship
     */
    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function supervisors()
    {
        return $this->belongsToMany(Supervisor::class)
            ->withPivot('id');
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function employees()
    {
        return $this->supervisors()->map(fn ($item) => $item->employees)->collapse();
    }

    public function login()
    {
        return $this->hasOne(UserLogin::class);
    }
}
