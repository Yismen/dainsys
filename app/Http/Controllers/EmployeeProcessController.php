<?php

namespace App\Http\Controllers;

use App\Models\Process;
use App\Models\Employee;

class EmployeeProcessController extends Controller
{
    public function __construct()
    {
        $this->middleware('authorize:view-employee-process|edit-employee-process|create-employee-process', ['only' => ['index', 'show']]);
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

    public function show(int $employee_id, int $process_id)
    {
        return view('employee-process.show', [
            'process_id' => $process_id,
            'employee_id' => $employee_id,
        ]);
    }
}
