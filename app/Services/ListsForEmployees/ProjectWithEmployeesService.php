<?php

namespace App\Services\ListsForEmployees;

use App\Models\Project;

class ProjectWithEmployeesService extends ListForEmployeesBase
{
    public static function model(): string
    {
        return Project::class;
    }
}
