<?php

namespace App\Models;

use App\Models\DainsysModel as Model;

class BankAccount extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $fillable = ['bank_id', 'account_number'];

    public function employee()
    {
        return $this->belongsTo(\App\Models\Employee::class);
    }

    public function bank()
    {
        return $this->belongsTo(\App\Models\Bank::class);
    }

    // Methods ===================================================

    // Scopes ====================================================

    // Accessors =================================================

    // Mutators ==================================================
}
