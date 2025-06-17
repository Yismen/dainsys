<?php

namespace App\Models;

use App\Models\DainsysModel as Model;

class Bolean extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;
    protected $fillable = ['bolean'];
}
