<?php

namespace App\Http\Controllers\Employee;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Events\EmployeeTerminated;
use App\Events\EmployeeReactivated;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class TerminationController extends Controller
{
    public function terminate(Request $request, Employee $employee)
    {
        $this->validate($request, [
            'termination_date' => 'required|date',
            'termination_type_id' => 'required|integer|exists:termination_types,id',
            'termination_reason_id' => 'required|integer|exists:termination_reasons,id',
            'can_be_rehired' => 'required|boolean',
        ]);

        Cache::forget('empleados');

        if ($employee->termination()->exists()) {
            $employee->termination()->update($request->only(['termination_date', 'termination_type_id', 'termination_reason_id', 'can_be_rehired', 'comments']));
        } else {
            $termination = $employee->termination()->create($request->only(['termination_date', 'termination_type_id', 'termination_reason_id', 'can_be_rehired', 'comments']));
            event(new EmployeeTerminated($employee, $termination));
        }

        return $employee->load(
            'termination'
        )
        ->append([
            'termination_type_list',
            'termination_reason_list'
        ]);
    }

    public function reactivate(Request $request, Employee $employee)
    {
        $this->validate($request, [
            'hire_date' => 'required|date',
        ]);

        $employee->termination()->delete();
        $employee->update($request->only(['hire_date']));

        Cache::forget('empleados');
        Cache::forget('terminations');

        event(new EmployeeReactivated());

        return $employee->loadLists();
    }
}
