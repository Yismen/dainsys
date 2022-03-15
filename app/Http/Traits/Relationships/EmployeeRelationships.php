<?php

namespace App\Http\Traits\Relationships;

use App\Afp;
use App\Ars;
use App\Vip;
use App\Card;
use App\Hour;
use App\Site;
use App\Punch;
use App\Shift;
use App\Gender;
use App\Address;
use App\Marital;
use App\Project;
use App\Position;
use App\Schedule;
use App\LoginName;
use App\Universal;
use App\Attendance;
use App\Department;
use App\Supervisor;
use App\BankAccount;
use App\Nationality;
use App\Performance;
use App\Termination;
use App\OvernightHour;
use App\SocialSecurity;

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
