<?php

namespace App\Http\Controllers\Api\Performances;

use App\Supervisor;
use App\Http\Controllers\Controller;
use App\Http\Resources\SupervisorsResource;

/**
 * @group Performances
 */
class SupervisorsController extends Controller
{

    /**
     * Performances Supervisors
     * 
     * Collection of employees' supervisors.
     * 
     * @response 200 {
     *      "data": [
     *          {
     *              "id": 1,
     *              "name": "Yismen Jorge",
     *              "active": 1,
     *          }
     *      ]
     *  }
     */
    public function __invoke()
    {
        $supervisors = Supervisor::orderBy('name')->get();

        return SupervisorsResource::collection($supervisors);
    }

    /**
     * Performances Active Supervisors
     * 
     * Collection of employees' Actives supervisors.
     * 
     * @response 200 {
     *      "data": [
     *          {
     *              "id": 1,
     *              "name": "Yismen Jorge",
     *              "active": 1,
     *          }
     *      ]
     *  }
     */
    public function actives()
    {
        $supervisors = Supervisor::actives()->orderBy('name')->get();

        return SupervisorsResource::collection($supervisors);
    }
}
