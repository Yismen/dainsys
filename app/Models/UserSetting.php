<?php

namespace App\Models;

use App\Models\DainsysModel as Model;

class UserSetting extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;
    protected $fillable = ['data'];
}
