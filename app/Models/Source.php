<?php

namespace App\Models;

use App\Models\DainsysModel as Model;

class Source extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $fillable = ['name'];

    protected function name(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(set: fn ($name) => ['name' => ucwords(trim((string) $name))]);
    }

    public function campaigns()
    {
        return $this->hasMany(Campaign::class);
    }
}
