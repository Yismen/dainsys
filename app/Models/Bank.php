<?php

namespace App\Models;

use App\Models\DainsysModel as Model;

class Bank extends Model
{
    protected $fillable = ['name'];

    // Relationships =============================================
    public function accounts()
    {
        return $this->hasMany('App\Models\BankAccount');
    }

    public function setNameAttribute($name)
    {
        return $this->attributes['name'] = ucwords(trim($name));
    }
}
