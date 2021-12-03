<?php

namespace App;

use App\DainsysModel as Model;
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
        return $this->hasMany('App\Employee');
    }

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = trim(ucwords($name));
    }
}
