<?php

namespace App\Models;

use App\Models\DainsysModel as Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Punch extends Model
{
    use Sluggable;

    protected $fillable = ['punch', 'employee_id'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'employee.fullName',
                'onUpdate' => true,
            ],
        ];
    }

    /**
     * -----------------------------------------------------------
     * Relationships.
     */
    public function employee()
    {
        return $this->belongsTo('App\Models\Employee');
    }

    /**
     * ---------------------------------------------------
     * Accessors.
     */
    public function getEmployeeListAttribute()
    {
        $employees = $this->employee()->pluck('id');

        if ($employees->count() > 0) {
            return $employees[0];
        }
    }

    public function getEmployeesListAttribute()
    {
        $employees = \App\Models\Employee::orderBy('first_name')
            ->orderBy('second_first_name')
            ->orderBy('last_name')
            ->get();

        return $employees->pluck('fullName', 'id');
    }

    public function getFreeEmployeesAttribute()
    {
        return Employee::with('punch')
            ->sorted()
            ->actives()
            ->whereDoesntHave('punch')
            ->orWhere('id', $this->employee->id)
            ->get();
    }

    public function setPunchAttribute($punch)
    {
        $this->attributes['punch'] = strtoupper($punch);
    }
}
