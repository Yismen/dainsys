<?php

namespace App\Models;

use App\Models\DainsysModel as Model;

class AppSetting extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $fillable = ['skin', 'layout', 'mini', 'collapse'];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
