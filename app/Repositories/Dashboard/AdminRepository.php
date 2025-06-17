<?php

namespace App\Repositories\Dashboard;

use App\Models\Performance;
use App\Models\Role;
use App\Models\User;
use App\Repositories\PerformanceRepository;

class AdminRepository
{
    public static function toArray()
    {
        $static = new self();

        $mtdData = (new PerformanceRepository());

        return [
            'revenue' => number_format(Performance::sum('revenue'), 2),
            'revenue_mtd' => number_format($mtdData->monthToDateData()->sum('revenue'), 2),
            'users' => User::latest()->with('profile')->get(),
            'roles' => $static->getRoles(),
        ];
    }

    protected function getRoles()
    {
        return Role::with(['users' => fn($query) => $query->orderBy('name'),
        ])
            ->with(['permissions' => fn($query) => $query->orderBy('resource'),
            ])
            ->with(['menus' => fn($query) => $query->orderBy('name'),
            ])
            ->orderBy('name')->get();
    }
}
