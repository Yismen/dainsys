<?php

namespace App\Http\Controllers;

class StepController extends Controller
{
    public function __construct()
    {
        $this->middleware('authorize:view-steps|edit-steps|create-steps', ['only' => ['index', 'show']]);
    }

    public function index()
    {
        return view('steps.index');
    }
}
