<?php

namespace App\Repositories\Dashboard;

use App\Performance;
use App\Repositories\Dashboard\DataRepository;
use App\Repositories\EmployeeRepository;
use App\Repositories\PerformanceRepository;
use App\Repositories\ProjectRepository;
use App\Repositories\SiteRepository;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Cache;

class AdminRepository
{
    public static function toArray()
    {         
        $static = new self();

        $mtdData = (new PerformanceRepository());
        
        return [
            'revenue' => number_format(Performance::sum('revenue'), 2),
            'revenue_mtd' => number_format($mtdData->monthToDateData()->sum('revenue'), 2),
            'users' => User::get(),
            'roles' => $static->getRoles()
        ];
    }

    protected function getRoles()
    {
        return Role::with(['users' => function($query) {
                return $query->orderBy('name');    
            }])
            ->with(['permissions' => function($query) {
                return $query->orderBy('resource');    
            }])
            ->with(['menus' => function($query) {
                return $query->orderBy('name');    
            }])
            ->orderBy('name')->get();
    }
}
