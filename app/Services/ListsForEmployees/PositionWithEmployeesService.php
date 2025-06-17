<?php

namespace App\Services\ListsForEmployees;

use App\Models\Position;

class PositionWithEmployeesService extends ListForEmployeesBase
{
    public static function model(): string
    {
        return Position::class;
    }
}
