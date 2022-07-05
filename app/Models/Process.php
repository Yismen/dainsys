<?php

namespace App\Models;

use App\Models\DainsysModel as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Process extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'description'];
}
