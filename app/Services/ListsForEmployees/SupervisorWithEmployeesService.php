<?php

namespace App\Services\ListsForEmployees;

use App\Models\Supervisor;

class SupervisorWithEmployeesService extends ListForEmployeesBase
{
    public static function model(): string
    {
        return Supervisor::class;
    }
}
