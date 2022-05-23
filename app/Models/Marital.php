<?php

namespace App\Models;

use App\Models\DainsysModel as Model;

class Marital extends Model
{
    protected $fillable = ['name'];

    /**
     * ---------------------------------------------------
     * Relationships
     * ------------------------------------------------
     */
    public function employees()
    {
        return $this->hasMany('App\Models\Employee');
    }
}
