<?php

namespace App\Http\Controllers\Attendance;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Repositories\Attendances\AttendanceEmployeesRepository;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('authorize:view-attendances');
    }

    public function show(Request $request, Employee $employee)
    {
        $repo = new AttendanceEmployeesRepository($employee->id);

        return view('attendances._by_employees', ['data' => $repo->data(), 'employee' => $employee]);
    }
}
