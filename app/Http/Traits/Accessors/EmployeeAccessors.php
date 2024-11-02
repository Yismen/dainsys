<?php

namespace App\Http\Traits\Accessors;

use App\Models\Afp;
use App\Models\Ars;
use App\Models\Bank;
use App\Models\Site;
use App\Models\Gender;
use App\Models\Marital;
use App\Models\Project;
use App\Models\Position;
use App\Models\Department;
use App\Models\Supervisor;
use App\Models\Nationality;
use App\Models\PaymentType;
use App\Models\TerminationType;
use App\Models\PaymentFrequency;
use App\Models\TerminationReason;

trait EmployeeAccessors
{
    /**
     * return a list array of the systems, including name and id.
     *
     * @return array a list of systems registered
     */
    public function getNationalitiesListAttribute()
    {
        return Nationality::orderBy('name')->get();
    }

    public function getArsListAttribute()
    {
        return Ars::orderBy('name')->get();
    }

    public function getAfpListAttribute()
    {
        return Afp::orderBy('name')->get();
    }

    public function getSupervisorsListAttribute()
    {
        return Supervisor::orderBy('name')->select('id', 'name')->get();
    }

    public function getBanksListAttribute()
    {
        return Bank::orderBy('name')->get();
    }

    public function getSitesListAttribute()
    {
        return Site::orderBy('name')->get();
    }

    public function getProjectsListAttribute()
    {
        return Project::orderBy('name')->get();
    }

    public function getCurrentSupervisorAttribute()
    {
        return $this->supervisor()->pluck('id');
    }

    public function getPhotoAttribute($photo)
    {
        return empty($photo)
            ? 'images/placeholders/300.png'
            : $photo;
    }

    public function getStatusAttribute()
    {
        return $this->is_active ? 'Active' : 'Inactive';
    }

    public function getActiveAttribute(): bool
    {
        return $this->termination ? false : true;
    }

    public function getIsActiveAttribute()
    {
        return $this->active;
    }

    public function getIsVipAttribute(): bool
    {
        return $this->vip ? true : false;
    }

    public function getIsUniversalAttribute(): bool
    {
        return $this->universal ? true : false;
    }

    /**
     * Return a new instance for the date.
     *
     * @param [type] $date [description]
     *
     * @return [type] [description]
     */
    // public function getHireDateAttribute($date)
    // {
    //  return Carbon::parse($date)->format('Y-m-d h:i:s');
    // }

    // public function getDateOfBirthAttribute($date)
    // {
    //  return Carbon::parse($date)->format('Y-m-d h:i:s');
    // }

    /**
     * Convert the Date of birth to date.
     *
     * @param datetime $date employee date of birth
     *
     * @return datetime an instance of carbon
     */
    // public function getDateOfBirthAttribute($date)
    // {
    //  return Carbon::parse($date)->format('Y-m-d');
    // }

    /**
     * define the attribute can be rehired.
     *
     * @return bool whether or not the
     */
    public function getCanBeRehiredAttribute()
    {
        return $this->termination->can_be_rehired ?? null;
    }

    public function getTerminationDateAttribute()
    {
        return $this->termination->termination_date->format('Y-m-d') ?? now()->format('Y-m-d');
    }

    public function getTerminationTypeIdAttribute()
    {
        $this->termination->terminationType->id ?? null;
    }

    public function getTerminationTypeListAttribute()
    {
        return TerminationType::orderBy('name')->get();
    }

    public function getTerminationReasonIdAttribute()
    {
        return $this->termination->terminationType->id ?? null;
    }

    public function getTerminationReasonListAttribute()
    {
        return TerminationReason::select('reason', 'id')->get();
    }

    /**
     * convert the First Name to UC Words.
     *
     * @param string $first_name Employee First name
     *
     * @return string Converted to ucwords
     */
    public function getFirstNameAttribute($name)
    {
        return filled($name)
            ? str($name)->trim()->headline()->value
            : '';
    }

    public function getSecondFirstNameAttribute($name)
    {
        return filled($name)
            ? str($name)->trim()->headline()->value
            : '';
    }

    /**
     * convert the First Name to UC Words.
     *
     * @param string $first_name Employee First name
     *
     * @return string Converted to ucwords
     */
    public function getLastNameAttribute($name)
    {
        return filled($name)
            ? str($name)->trim()->headline()->value
            : '';
    }

    public function getSecondLastNameAttribute($name)
    {
        return filled($name)
            ? str($name)->trim()->headline()->value
            : '';
    }

    /**
     * Concatanets firs name and last name attributes.
     *
     * @return string first and last names joint by space
     */
    public function getFullNameAttribute()
    {
        $name = join(" ", [
            $this->first_name,
            $this->second_first_name,
            $this->last_name,
            $this->second_last_name,
        ]);

        return str($name)->trim()->headline()->value;
    }

    /**
     * list the has kids attribute.
     *
     * @return array
     */
    public function getHasKidsListAttribute()
    {
        return ['0' => 'No', '1' => 'Yes'];
    }

    public function getDepartmentsListAttribute()
    {
        return Department::orderBy('name')->select('name', 'id')->get();
    }

    public function getPaymentTypesListAttribute()
    {
        return PaymentType::orderBy('name')->select('name', 'id')->get();
    }

    public function getPaymentFrequenciesListAttribute()
    {
        return PaymentFrequency::orderBy('name')->select('name', 'id')->get();
    }

    /**
     * List all the Genders model.
     *
     * @return [array] [description]
     */
    public function getGendersListAttribute()
    {
        return Gender::select('name', 'id')->get();
    }

    public function getMaritalsListAttribute()
    {
        return Marital::orderBy('name')->select('name', 'id')->get();
    }

    /**
     * List all the departments.
     *
     * @return array [description]
     */
    public function getPositionsListAttribute()
    {
        return Position::orderBy('name')
            ->with('department', 'payment_type', 'payment_frequency')
            ->get();
    }
}
