<?php

namespace App\Models;

use App\Models\DainsysModel as Model;

class Bank extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;
    protected $fillable = ['name'];

    // Relationships =============================================
    public function accounts()
    {
        return $this->hasMany(\App\Models\BankAccount::class);
    }

    protected function name(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(set: function ($name) {
            return $this->attributes['name'] = ucwords(trim($name));
            return ['name' => ucwords(trim($name))];
        });
    }
}
