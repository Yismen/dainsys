<?php

namespace App\Models;

use App\Models\DainsysModel as Model;

class TerminationType extends Model
{
    protected $fillable = ['name', 'description'];

    public function setNameAttribute($name)
    {
        return $this->attributes['name'] = ucwords(trim($name));
    }
}
