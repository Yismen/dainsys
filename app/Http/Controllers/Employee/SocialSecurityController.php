<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SocialSecurityController extends Controller
{
    public function update(Employee $employee, Request $request)
    {
        $this->validate($request, [
            'number' => 'required|min:5|max:10|unique:social_securities,number,' . $employee->id . ',employee_id',
        ]);

        Cache::forget('employees');
        Cache::forget('social-securities');

        $employee->socialSecurity()->updateOrCreate([], $request->only('number'));

        return $employee->loadLists();
    }
}
