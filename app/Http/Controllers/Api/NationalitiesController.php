<?php

namespace App\Http\Controllers\Api;

use App\Nationality;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\NationalityResource;
use Carbon\Carbon;

class NationalitiesController extends Controller
{
    /**
     * Store Nationalities
     * 
     * Save a Nationality model to database.
     * 
     * @bodyParam name string required The name of the Nationality     *
     * @response 201 {
     *      "name": "Asdfasdf",
     *  }
     */
    public function store()
    {
        $this->validate(request(), [
            'name' => 'required'
        ]);

        $afp = Nationality::create(request()->all());

        return response()->json($afp, 201);
    }
}
