<?php

namespace App\Models;

use App\Models\DainsysModel as Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Afp extends Model
{
    use Sluggable;

    protected $fillable = ['name'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['name'],
                'onUpdate' => true,
            ],
        ];
    }

    public function employees()
    {
        return $this->hasMany('App\Models\Employee');
    }

    protected function name(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(set: function ($name) {
            return ['name' => trim(ucwords($name))];
        });
    }
}
