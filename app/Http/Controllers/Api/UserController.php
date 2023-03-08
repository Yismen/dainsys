<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Authenticated User
     *
     * Return information of the authenticated user
     *
     * @response 200 {
     *      "id": 1,
     *      "name": "Yismen Jorge",
     *      "email": "yismen.jorge@gmail.com",
     *      "is_active": 1,
     *      "is_admin": 1,
     *      "username": "yjorge",
     *      "created_at": "2021-11-19T15:09:09.000000Z",
     *      "updated_at": "2021-11-19T15:09:09.000000Z",
     *      "deleted_at": null
     *  }
     */
    public function index(Request $request)
    {
        return $request->user();
    }
}
