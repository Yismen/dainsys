<?php

namespace App\Models;

use App\Models\DainsysModel as Model;

class Nationality extends Model
{
    protected $fillable = ['name'];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    protected function name(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(set: function ($name) {
            return $this->attributes['name'] = ucwords(
                strtolower(
                    trim($name, ' ')
                )
            );
            return ['name' => ucwords(
                strtolower(
                    trim($name, ' ')
                )
            )];
        });
    }
}
