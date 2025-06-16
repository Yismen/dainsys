<?php

namespace App\Models;

use App\Models\DainsysModel as Model;

class Source extends Model
{
    protected $fillable = ['name'];

    protected function name(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(set: function ($name) {
            return ['name' => ucwords(trim($name))];
        });
    }

    public function campaigns()
    {
        return $this->hasMany(Campaign::class);
    }
}
