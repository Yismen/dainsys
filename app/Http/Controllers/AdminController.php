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
        return redirect()->route('admin.dashboards');
    }
}
