<?php

namespace App\Models;

use App\Models\DainsysModel as Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Ars extends Model
{
    use Sluggable;

    protected $table = 'arss';

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

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = trim(ucwords($name));
    }
}
