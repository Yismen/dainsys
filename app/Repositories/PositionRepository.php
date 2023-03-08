<?php

namespace App\Repositories;

use App\Models\Position;

class PositionRepository
{
    public static function all()
    {
        $instance = new self();

        return $instance->query()->get();
    }

    public static function actives()
    {
        $instance = new self();

        return $instance->query()->whereHas('employees', function ($query) {
            return $query->actives();
        })
            ->get();
    }
    protected function query()
    {
        return Position::orderBy('name');
    }
}
