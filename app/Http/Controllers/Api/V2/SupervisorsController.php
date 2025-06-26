<?php

namespace App\Http\Controllers\Api\V2;

use App\Http\Controllers\Controller;
use App\Http\Resources\SupervisorsResource;
use App\Models\Supervisor;

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

    /**
     * Store Supervisors
     *
     * Save a Supervisor model to database.
     *
     * @bodyParam name string required The name of the Supervisor
     *
     * @response 201 {
     *      "name": "Asdfasdf",
     *      "updated_at": "2021-12-01T19:05:29.000000Z",
     *      "created_at": "2021-12-01T19:05:29.000000Z",
     *      "id": 12
     *  }
     */
    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
        ]);

        $supervisor = Supervisor::create(request()->all());

        return response()->json($supervisor, 201);
    }
}
