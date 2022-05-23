<?php

namespace App\Models;

use App\Models\DainsysModel as Model;

class Nationality extends Model
{
    protected $fillable = ['name'];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function setNameAttribute($name)
    {
        return $this->attributes['name'] = ucwords(
            strtolower(
                trim($name, ' ')
            )
        );
    }
}
