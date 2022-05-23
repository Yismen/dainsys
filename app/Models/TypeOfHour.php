<?php

namespace App\Models;

use App\Models\DainsysModel as Model;

class TypeOfHour extends Model
{
    /**
     * mass assignable
     */
    protected $fillable = ['type',  'display_name'];
}
