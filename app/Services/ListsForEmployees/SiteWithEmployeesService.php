<?php

namespace App\Services\ListsForEmployees;

use App\Models\Site;

class SiteWithEmployeesService extends ListForEmployeesBase
{
    public static function model(): string
    {
        return Site::class;
    }
}
