<?php

namespace App\Models;

use App\Models\DainsysModel as Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Punch extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;
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
        return $this->belongsTo(\App\Models\Employee::class);
    }

    /**
     * ---------------------------------------------------
     * Accessors.
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

    protected function employeesList(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(get: function () {
            $employees = \App\Models\Employee::orderBy('first_name')
                ->orderBy('second_first_name')
                ->orderBy('last_name')
                ->get();
            return $employees->pluck('fullName', 'id');
        });
    }

    protected function freeEmployees(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(get: fn() => Employee::with('punch')
            ->sorted()
            ->actives()
            ->whereDoesntHave('punch')
            ->orWhere('id', $this->employee->id)
            ->get());
    }

    protected function punch(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(set: fn($punch) => ['punch' => strtoupper((string) $punch)]);
    }
}
