<?php

namespace App\Models;

use App\Models\DainsysModel as Model;

class TypeOfHour extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    /**
     * mass assignable
     */
    protected $fillable = ['type',  'display_name'];
}
