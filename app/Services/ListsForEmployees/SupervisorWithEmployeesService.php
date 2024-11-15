<?php

namespace App\Services\ListsForEmployees;

use App\Models\Supervisor;
use Illuminate\Support\Facades\Cache;
use App\Services\Contracts\EmployeeRelationshipContract;

class SupervisorWithEmployeesService extends ListForEmployeesBase
{

    public static function model(): string
    {
        return Supervisor::class;
    }
}
