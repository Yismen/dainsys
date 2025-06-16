<?php

namespace App\Models;

use App\Models\DainsysModel as Model;

class TerminationType extends Model
{
    protected $fillable = ['name', 'description'];

    protected function name(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(set: function ($name) {
            return $this->attributes['name'] = ucwords(trim($name));
            return ['name' => ucwords(trim($name))];
        });
    }
}
