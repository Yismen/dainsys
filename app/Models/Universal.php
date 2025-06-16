<?php

namespace App\Models;

use App\Models\DainsysModel as Model;

class Universal extends Model
{
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
    protected function casts(): array
    {
        return [
            'since' => 'datetime',
        ];
    }
}
