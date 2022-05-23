<?php

namespace App\Models;

use App\Models\DainsysModel as Model;

class SocialSecurity extends Model
{
    protected $fillable = ['number'];

    // Relationships =============================================
    public function employee()
    {
        return $this->belongsTo('App\Models\Employee');
    }
}
