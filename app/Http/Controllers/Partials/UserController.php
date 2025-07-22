<?php

namespace App\Http\Controllers\Partials;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $users = User::with([
            'profile',
            'roles',
        ])
        ->where('name', 'like', '%'.request('q').'%')
        ->orWhere('email', 'like', '%'.request('q').'%')
        ->get();

        return view('partials._users', [
            'users' => $users,
        ]);
    }
}
