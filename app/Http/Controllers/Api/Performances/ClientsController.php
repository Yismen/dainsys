<?php

namespace App\Http\Controllers\Api\Performances;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClientResource;
use App\Models\Client;

/**
 * @group Performances
 */ class ClientsController extends Controller
{
    /**
     * Performances Clients
     *
     * Collection of clients information
     *
     * @response 200 {
     *      "data": [
     *          {
     *              "id": 1,
     *              "name": "Miss Ericka Medhurst",
     *              "contact_name": "Roel Harvey",
     *              "main_phone": "(954) 631-9605",
     *              "email": "toy.raquel@hotmail.com",
     *              "secondary_phone": "+14408935480",
     *              "account_number": "929-384-1946"
     *          }
     *      ]
     *  }
     */
    public function __invoke()
    {
        $projects = Client::get();

        return ClientResource::collection($projects);
    }
}
