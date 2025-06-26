<?php

namespace App\Models;

use App\Models\DainsysModel as Model;

class Project extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    /**
     * Fillable fields
     *
     * @var array
     */
    public $fillable = ['name', 'client_id'];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function performances()
    {
        return $this->hasManyThrough(Performance::class, Campaign::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    protected function clientsList(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(get: fn () => Client::orderBy('name')->pluck('name', 'id'));
    }

    public function isNotDowntimes($query)
    {
        return $query;
    }
}
