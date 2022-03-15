<?php

namespace App\Http\Controllers\Api\V2;

use App\Department;
use App\Http\Controllers\Controller;

class DepartmentsController extends Controller
{
    /**
     * Store Departmens
     *
     * Save a Department model to database.
     *
     * @bodyParam name string required The name of the Department
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

        $afp = Department::create(request()->all());

        return response()->json($afp, 201);
    }
}
