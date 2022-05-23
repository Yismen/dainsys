<?php

namespace App\Http\Controllers\Api;

use App\Models\Ars;
use App\Http\Controllers\Controller;

class ArssController extends Controller
{
    /**
     * Store Ars
     *
     * Save a Ars model to database.
     *
     * @bodyParam name string required The name of the Ars
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

        $afp = Ars::create(request()->all());

        return response()->json($afp, 201);
    }
}
