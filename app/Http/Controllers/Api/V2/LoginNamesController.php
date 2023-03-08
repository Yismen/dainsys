<?php

namespace App\Http\Controllers\Api\V2;

use App\Http\Controllers\Controller;
use App\Http\Resources\LoginNameResource;
use App\Models\LoginName;

/**
 * @group Performances
 */
class LoginNamesController extends Controller
{
    /**
     * Performances Login Names
     *
     * Return a collection of login names.
     *
     * @queryParam recents optional When present, only login names for employees labeled as recents will be included. Default is true. Example ?recents=true
     *
     * @return \Illuminate\Support\Collection;
     * /**
     *
     * @response 200 {
     *  "employee_id": 10001,
     *  "employee_name": Yismen Jorge,
     *  "login": yjorge,
     *  "supervisor_id": 1
     * }
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
