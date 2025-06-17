<?php

namespace App\Repositories;

use App\Models\Department;

class DepartmentRepository
{
    public static function actives()
    {
        $instance = new self();

        return $instance->query()->whereHas('employees', fn($query) => $query->actives())->get();
    }
    protected function query()
    {
        return Department::orderBy('name');
    }

    protected static function all()
    {
        $instance = new self();

        return $instance->query()->get();
    }
}
