<?php

namespace App\Http\Controllers\Employee;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class SupervisorController extends Controller
{
    public function assign(Employee $employee, Request $request)
    {
        $this->validate($request, [
            'supervisor_id' => 'required|exists:supervisors,id',
        ]);

        Cache::forget('employees');

        $employee->update($request->only('supervisor_id'));

        return $employee->loadLists();
    }
}
