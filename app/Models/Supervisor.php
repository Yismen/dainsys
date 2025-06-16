<?php

namespace App\Models;

use App\Models\DainsysModel as Model;

class Supervisor extends Model
{
    protected $fillable = ['name', 'active'];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)
            ->withPivot('id');
    }

    public function attendances()
    {
        return $this->hasManyThrough(Attendance::class, User::class);
    }

    protected function status(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(get: function () {
            return $this->active ? 'Active' : 'Inactive';
        });
    }

    protected function name(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(set: function ($name) {
            return $this->attributes['name'] = ucwords(trim($name));
            return ['name' => ucwords(trim($name))];
        });
    }

    public function scopeActives($query)
    {
        return $query->where('active', 1);
    }

    public function scopeInactives($query)
    {
        return $query->where('active', 0);
    }
}
