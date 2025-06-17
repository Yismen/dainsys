<?php

namespace App\Models;

use App\Models\DainsysModel as Model;

class RevenueType extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $fillable = ['name'];
}
