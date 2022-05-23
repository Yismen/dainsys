<?php

namespace App\Models;

use App\Models\DainsysModel as Model;

class BankAccount extends Model
{
    protected $fillable = ['bank_id', 'account_number'];

    public function employee()
    {
        return $this->belongsTo('App\Models\Employee');
    }

    public function bank()
    {
        return $this->belongsTo('App\Models\Bank');
    }

    // Methods ===================================================

    // Scopes ====================================================

    // Accessors =================================================

    // Mutators ==================================================
}
