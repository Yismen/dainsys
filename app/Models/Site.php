<?php

namespace App\Models;

use App\Models\DainsysModel as Model;

class Site extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $fillable = ['name'];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function performances()
    {
        return $this->hasManyThrough(Performance::class, Employee::class);
    }
}
