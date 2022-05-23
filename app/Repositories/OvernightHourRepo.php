<?php

namespace App\Repositories;

use App\Models\Employee;
use App\Models\OvernightHour;

class OvernightHourRepo
{
    public function all()
    {
        return OvernightHour::with('employee');
    }

    public function employees()
    {
        return Employee::recents()
            ->sorted()
            ->with('overnightHours');
    }
}
