<?php

namespace App\Models;

use App\Models\DainsysModel as Model;

class DowntimeReason extends Model
{
    /**
     * mass assignable
     */
    protected $fillable = ['id', 'name'];

    public function setNameAttribute($name)
    {
        return $this->attributes['name'] = ucwords(trim($name));
    }

    public function getNameAttribute($name)
    {
        return ucwords(trim($name));
    }

    public function hours()
    {
        return $this->hasMany(Performance::class);
    }
}
