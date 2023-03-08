<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin()
    {
        $user = auth()->user();
        if ($user && ! $user->profile) {
            return redirect()->route('admin.profiles.create');
        }

        return redirect()->route('admin.dashboards');
    }
}
