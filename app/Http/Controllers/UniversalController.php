<?php

namespace App\Http\Controllers;

class UniversalController extends Controller
{
    public function __construct()
    {
        $this->middleware('authorize:view-universals|edit-universals|create-universals', ['only' => ['index']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('universals.index');
    }
}
