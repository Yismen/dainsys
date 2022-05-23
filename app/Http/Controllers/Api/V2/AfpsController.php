<?php

namespace App\Http\Controllers\Api\V2;

use App\Models\Afp;
use App\Http\Controllers\Controller;

class AfpsController extends Controller
{
    /**
     * Store Afps
     *
     * Save a Afp model to database.
     *
     * @bodyParam name string required The name of the Afp
     * @response 201 {
     *      "name": "Asdfasdf",
     *      "slug": "asdfasdf",
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

        $afp = Afp::create(request()->all());

        return response()->json($afp, 201);
    }
}
