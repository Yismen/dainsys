<?php

namespace App\Http\Controllers;

class ProcessController extends Controller
{
    public function __construct()
    {
        $this->middleware('authorize:view-processes|edit-processes|create-processes', ['only' => ['index', 'show']]);
    }

    public function index()
    {
        return view('processes.index');
    }
}
