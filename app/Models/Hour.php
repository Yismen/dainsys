<?php

namespace App\Models;

use App\Models\DainsysModel as Model;

class Hour extends Model
{
    protected $fillable = ['employee_id', 'name', 'date', 'unique_id', 'regulars', 'nightly', 'holidays', 'training', 'overtime'];

    protected $casts = [
        'date' => 'datetime',
    ];

    // Relationships =============================================
    public function employee()
    {
        return $this->belongsTo('App\Models\Employee')->select('id', 'position_id', 'first_name', 'second_first_name', 'last_name', 'second_last_name');
    }

    // Methods ===================================================

    // Scopes ====================================================

    // Accessors =================================================

    // Mutators ==================================================
}
