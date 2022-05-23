<?php

namespace App\Http\Controllers\Api;

use App\Models\Bank;
use App\Http\Controllers\Controller;

class BanksController extends Controller
{
    /**
     * Store Banks
     *
     * Save a Banks model to database.
     * @bodyParam name string required The name of the Banks
     * @response 201 {
     *      "name": "Asdfasdf",
     *  }
     */
    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
        ]);

        $afp = Bank::create(request()->all());

        return response()->json($afp, 201);
    }
}
