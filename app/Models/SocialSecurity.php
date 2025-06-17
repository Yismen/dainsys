<?php

namespace App\Models;

use App\Models\DainsysModel as Model;

class SocialSecurity extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;
    protected $fillable = ['number'];

    // Relationships =============================================
    public function employee()
    {
        return $this->belongsTo(\App\Models\Employee::class);
    }
}
