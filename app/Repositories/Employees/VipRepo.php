<?php

namespace App\Repositories\Employees;

use App\Models\Employee;

class VipRepo
{
    public function vips()
    {
        return Employee::query()
            ->actives()
            ->sorted()
            ->vips();
    }

    public function noVips()
    {
        return Employee::query()
            ->actives()
            ->sorted()
            ->noVips();
    }
}
