<?php

namespace App\Services\ListsForEmployees;

use App\Models\Project;
use Illuminate\Support\Facades\Cache;
use App\Services\Contracts\EmployeeRelationshipContract;

class ProjectWithEmployeesService  extends ListForEmployeesBase
{

    public static function model(): string
    {
        return Project::class;
    }
}
