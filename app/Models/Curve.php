<?php

namespace App\Models;

use App\Models\DainsysModel as Model;

class Curve extends Model
{
    /**
     * mass assignable
     */
    protected $fillable = ['days_in_production_limit', 'goal_percentage_required'];
}
