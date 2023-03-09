<?php

namespace App\Http\Controllers\Attendance;

use App\Http\Controllers\Controller;
use App\Models\AttendanceCode;
use App\Repositories\Attendances\AttendanceCodesRepository;
use Illuminate\Http\Request;

class CodeController extends Controller
{
    public function __construct()
    {
        $this->middleware('authorize:view-attendances');
    }

    public function show(Request $request, $code)
    {
        $repo = new AttendanceCodesRepository($code);

        return view('attendances._by_codes', ['data' => $repo->data(), 'codes' => $repo->codes()]);
    }

    public function employees(AttendanceCode $code)
    {
        $repo = new AttendanceCodesRepository($code->id);

        return view('attendances._by_codes_employees', ['data' => $repo->data(), 'codes' => $repo->codes(), 'code' => $code]);
    }
}
