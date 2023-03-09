<?php

namespace App\Http\Controllers\Dashboards\RingCentral;

use App\Http\Controllers\Controller;

class ManagerController extends Controller
{
    public function __construct()
    {
        // $this->middleware('role:admin');
        $this->middleware('authorize:view-ring-central-dashboard', ['only' => ['index']]);
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboards.ring-central.manager');
    }
}
