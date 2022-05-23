<?php

namespace App\Repositories\Employees;

use App\Models\Employee;

class UniversalRepo
{
    public function universals()
    {
        return Employee::actives()
            ->sorted()
            ->universals();
    }

    public function noUniversals()
    {
        return Employee::actives()
            ->sorted()
            ->noUniversals();
    }
}
