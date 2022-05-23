<?php

namespace App\Models;

use App\Models\DainsysModel as Model;

class AppSetting extends Model
{
    protected $fillable = ['skin', 'layout', 'mini', 'collapse'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
