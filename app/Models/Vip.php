<?php

namespace App\Models;

use App\Models\DainsysModel as Model;

class Vip extends Model
{
    protected $casts = [
        'since' => 'datetime',
    ];

    protected $fillable = ['employee_id', 'since'];

    /**
     * A vip belongs to an employee.
     *
     * @return relation one to one
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
