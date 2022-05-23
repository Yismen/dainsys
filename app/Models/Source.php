<?php

namespace App\Models;

use App\Models\DainsysModel as Model;

class Source extends Model
{
    protected $fillable = ['name'];

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = ucwords(trim($name));
    }

    public function campaigns()
    {
        return $this->hasMany(Campaign::class);
    }
}
