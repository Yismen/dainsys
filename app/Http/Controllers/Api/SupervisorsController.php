<?php

namespace App\Http\Controllers\Api;

use App\Models\Supervisor;
use App\Http\Controllers\Controller;

class SupervisorsController extends Controller
{
    /**
     * Store Supervisors
     *
     * Save a Supervisor model to database.
     *
     * @bodyParam name string required The name of the Supervisor
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
