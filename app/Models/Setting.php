<?php

namespace App\Models;

use App\Models\DainsysModel as Model;

class Setting extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;
    protected $fillable = ['key', 'value'];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
