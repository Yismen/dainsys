<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class LoginNameController extends Controller
{
    public function store(Employee $employee, Request $request)
    {
        $this->validate($request, [
            'login' => 'required|unique:login_names',
        ]);

        $newlogin = $employee->loginNames()->create($request->only('login'));

        Cache::forget('employees');
        Cache::forget('login-names');

        return response($newlogin);
    }
}
