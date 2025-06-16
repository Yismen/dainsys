<?php

namespace App\Models;

use App\Models\DainsysModel as Model;

class Client extends Model
{
    protected $fillable = ['name', 'contact_name', 'main_phone', 'email', 'secondary_phone', 'account_number'];

    protected function name(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(set: function ($name) {
            return ['name' => ucwords(trim($name))];
        });
    }

    protected function contactName(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(set: function ($contact_name) {
            return ['contact_name' => ucwords(trim($contact_name))];
        });
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
