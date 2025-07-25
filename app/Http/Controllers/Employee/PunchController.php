<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PunchController extends Controller
{
    public function update(Employee $employee, Request $request)
    {
        $this->validate($request, [
            'punch' => 'required|unique:punches,punch,'.$employee->id.',employee_id',
        ]);

        $employee->punch()->updateOrCreate([], $request->only(['punch']));

        Cache::forget('employees');
        Cache::forget('punches');

        return $employee->loadLists();
    }
}
