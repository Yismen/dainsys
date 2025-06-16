<?php

namespace App\Models;

use App\Models\DainsysModel as Model;

class Card extends Model
{
    protected $fillable = ['card', 'employee_id'];

    /**
     * -----------------------------------------------------------
     * Relationships
     */
    public function employee()
    {
        return $this->belongsTo('App\Models\Employee');
    }

    /**
     * ---------------------------------------------------
     * Accessors
     */
    protected function employeeList(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(get: function () {
            $employees = $this->employee()->pluck('id');
            if ($employees->count() > 0) {
                return $employees[0];
            }
        });
    }

    /**
     * get employees with no cards added
     *
     * @return [type] [description]
     */
    protected function employeesList(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(get: function () {
            $employees = \App\Models\Employee::orderBy('first_name')
                ->get();
            return $employees->pluck('fullName', 'id');
        });
    }

    /**
     * --------------------------------------------------
     * Scopes
     */
    public function scopeUnassigned($query)
    {
        return $query->has('employee', false);
    }
}
