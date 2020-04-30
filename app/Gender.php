<?php

namespace App;

use App\DainsysModel as Model;

class Gender extends Model
{
    protected $fillable = ['name'];

    /**
     * ---------------------------------------------------
     * Relationships
     * ------------------------------------------------
     */
    public function employees()
    {
        return $this->hasMany('App\Employee');
    }
}
