<?php

namespace App\Models;

use App\Models\DainsysModel as Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Afp extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;
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
        return $this->hasMany(\App\Models\Employee::class);
    }

    protected function name(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(set: fn ($name) => ['name' => trim(ucwords((string) $name))]);
    }
}
