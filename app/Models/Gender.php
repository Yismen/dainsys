<?php

namespace App\Models;

use App\Models\DainsysModel as Model;

class Gender extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $fillable = ['name'];

    /**
     * ---------------------------------------------------
     * Relationships
     * ------------------------------------------------
     */
    public function employees()
    {
        return $this->hasMany(\App\Models\Employee::class);
    }
}
