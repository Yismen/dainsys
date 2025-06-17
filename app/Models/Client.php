<?php

namespace App\Models;

use App\Models\DainsysModel as Model;

class Client extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;
    protected $fillable = ['name', 'contact_name', 'main_phone', 'email', 'secondary_phone', 'account_number'];

    protected function name(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(set: fn($name) => ['name' => ucwords(trim((string) $name))]);
    }

    protected function contactName(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(set: fn($contact_name) => ['contact_name' => ucwords(trim((string) $contact_name))]);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
