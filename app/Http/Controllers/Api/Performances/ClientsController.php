<?php

namespace App\Http\Controllers\Api\Performances;

use App\Client;
use App\Http\Controllers\Controller;
use App\Http\Resources\ClientResource;

class ClientsController extends Controller
{
    public function __invoke()
    {
        $projects = Client::get();

        return ClientResource::collection($projects);
    }
}
