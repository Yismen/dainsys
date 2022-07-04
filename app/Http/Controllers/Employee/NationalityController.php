<?php

namespace App\Http\Controllers\Employee;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

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

        return $employee->loadLists();

        return $employee;
    }
}
