<?php

namespace App\Listeners;

use App\Events\EmployeeTerminated;

class UpdateTerminationDataField
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct() {}

    /**
     * Handle the event.
     *
     * @param  EmployeeTerminated $event
     *
     * @return void
     */
    public function handle(EmployeeTerminated $event)
    {
        $employee = $event->employee;

        $employee_data = json_encode([
            'name' => $employee->full_name,
            'hire_date' => $employee->hire_date,
            'site' => optional($employee)->site->name,
            'department' => optional($employee->position->department)->name,
            'project' => optional($employee->project)->name,
            'supervisor' => optional($employee->supervisor)->name,
            'salary' => optional($employee->position)->salary,
            'payment_type' => optional($employee->position->payment_type)->name,
        ]);

        $event->termination->updateQuietly(['employee_data' => $employee_data]);
    }
}
