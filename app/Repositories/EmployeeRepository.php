<?php

namespace App\Repositories;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Gender;
use App\Models\Nationality;
use App\Models\Position;
use App\Models\Project;
use App\Models\Site;
use App\Models\Supervisor;

class EmployeeRepository
{
    public static function all()
    {
        $instance = new self();

        return $instance->query()->get();
    }

    public static function actives()
    {
        $instance = new self();

        return $instance->query()->actives()->get();
    }

    public static function byStatus()
    {
        $static = new self();

        return $static->constrained(Gender::class);
    }

    public static function byGender()
    {
        $static = new self();

        return $static->constrained(Gender::class);
    }

    public static function bySite()
    {
        $static = new self();

        return $static->constrained(Site::class);
    }

    public static function byPosition()
    {
        $static = new self();

        return $static->constrained(Position::class);
    }

    public static function byDepartment()
    {
        $static = new self();

        return $static->constrained(Department::class);
    }

    public static function byProject()
    {
        $static = new self();

        return $static->constrained(Project::class);
    }

    public static function bySupervisor()
    {
        $static = new self();

        return $static->constrained(Supervisor::class);
    }

    public static function byNationality()
    {
        $static = new self();

        return $static->constrained(Nationality::class);
    }
    protected function query()
    {
        return Employee::query()
            ->sorted()
            ->filter(request()->all())
            ->forDefaultSites();
    }

    protected function constrained($class)
    {
        $class = new $class();

        return $class->withCount(['employees' => $this->constrainCallback()])
            ->whereHas('employees', $this->constrainCallback())->get();
    }

    protected function constrainCallback()
    {
        return fn($query) => $query->actives()
            ->filter(request()->all());
    }
}
