<?php

namespace App\Repositories;

use App\Models\Project;

class ProjectRepository
{
    public static function all()
    {
        $instance = new self;

        return $instance->query()->get();
    }

    public static function actives()
    {
        $instance = new self;

        return $instance->query()->whereHas('employees', fn ($query) => $query->actives())->get();
    }

    protected function query()
    {
        return Project::orderBy('name');
    }
}
