<?php

namespace App\Http\Controllers\Dashboards;

use App\User;
use App\Profile;
use App\Employee;
use App\Repositories\SiteRepository;
use App\Repositories\ProjectRepository;
use App\Repositories\BirthdaysRepository;

class DefaultDashboardController extends DashboardAbstractController
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        return view("{$this->views_location}.default", [
            'user' => auth()->user()->load(['roles.menus']),
            'app_name' => ucwords(config('dainsys.app_name', 'Dainsys')),
            'users_count' => User::count(),
            'employees_count' => Employee::actives()->count(),
            'profiles' => Profile::latest()->take(6)->with('user')->get(),
            'sites' => SiteRepository::actives()->count(),
            'projects' => ProjectRepository::actives()->count(),
            'birthdays' => BirthdaysRepository::today()->get(),
        ]);
    }
}
