<?php

namespace App\Http\Controllers\Api\Performances;

use App\Schedule;
use App\LoginName;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ScheduleResource;
use App\Http\Resources\LoginNameResource;

class LoginNamesController extends Controller
{


    /**
     * Retunr a collection of login names.
     * 
     * queryParam recents optional. When present, only login names for employees labeled as recents will be included. Default is true. Example ?recents=true
     * @return \Illuminate\Support\Collection;
     */
    public function __invoke()
    {
        $login_names = LoginName::with([
            'employee.supervisor',
        ])
            ->filter(request()->all())
            ->get();

        return LoginNameResource::collection($login_names);
    }
}
