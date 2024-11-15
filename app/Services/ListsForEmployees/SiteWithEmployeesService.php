<?php

namespace App\Services\ListsForEmployees;

use App\Models\Site;
use Illuminate\Support\Facades\Cache;
use App\Services\Contracts\EmployeeRelationshipContract;

class SiteWithEmployeesService extends ListForEmployeesBase
{
    public static function model(): string
    {
        return Site::class;
    }
}
