<?php

namespace App\Models;

use App\Models\DainsysModel as Model;

class Department extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;
    protected $fillable = ['name'];

    /**
     * Update the Department name field to be ucwords
     *
     * @param  [string] $name the name name's field
     *
     * @return string             converted string
     */
    protected function name(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(set: function ($name) {
            return $this->attributes['name'] = ucwords($name);
            return ['name' => ucwords($name)];
        });
    }

    public function positions()
    {
        return $this->hasMany(Position::class);
    }

    /**
     * many to many relationship with the employee model
     *
     * @return [array] [employees associated to current Department]
     */
    public function employees()
    {
        return $this->hasManyThrough(Employee::class, Position::class);
    }

    public function performances()
    {
        return $this->hasManyThrough(Performance::class, Employee::class, 'id', 'employee_id');
    }

    /**
     * Return the count of employees assigned to the current name
     *
     * @return int Count of employees assigned to the current name
     */
    public function employees_count()
    {
        return $this->employees()->count();
    }
}
