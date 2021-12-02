<?php

namespace App\Http\Controllers\Employee;

use Illuminate\Support\Facades\Cache;
use App\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NationalityController extends Controller
{
    public function assign(Employee $employee, Request $request)
    {
        $this->validate($request, [
            'nationality_id' => 'required|exists:nationalities,id',
        ]);

        Cache::forget('employees');
        Cache::forget('nationalities');

        $employee->update($request->only('nationality_id'));

        return $employee->load('nationality');

        return $employee;
    }
}
