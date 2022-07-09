<?php

namespace App\Http\Controllers;

class EmployeeProcessController extends Controller
{
    public function __construct()
    {
        $this->middleware('authorize:view-employee-process|edit-employee-process|create-employee-process', ['only' => ['index']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employee-process.index');
    }
}
