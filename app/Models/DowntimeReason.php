<?php

namespace App\Models;

use App\Models\DainsysModel as Model;

class DowntimeReason extends Model
{
    /**
     * mass assignable
     */
    protected $fillable = ['id', 'name'];
    protected function name(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(get: function ($name) {
            return ucwords(trim($name));
        }, set: function ($name) {
            return $this->attributes['name'] = ucwords(trim($name));
            return ['name' => ucwords(trim($name))];
        });
    }

    public function hours()
    {
        return $this->hasMany(Performance::class);
    }
}
