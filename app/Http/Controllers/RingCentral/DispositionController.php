<?php

namespace App\Http\Controllers\RingCentral;

use App\Http\Controllers\Controller;

class DispositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dispositions.index');
    }
}
