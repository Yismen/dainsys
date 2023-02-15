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
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  EmployeeTerminated $event
     * @return void
     */
    public function handle(EmployeeTerminated $event)
    {
        $employee = $event->employee;

        $employee_data = json_encode([
            'name' => $event->employee->full_name,
            'hire_date' => $event->employee->hire_date,
            'site' => optional($event->employee)->site->name,
            'department' => optional($event->employee->position->department)->name,
            'project' => optional($event->employee->project)->name,
            'supervisor' => optional($event->employee->supervisor)->name,
            'salary' => optional($event->employee->position)->salary,
            'payment_type' => optional($event->employee->position->payment_type)->name,
        ]);

        $event->termination->updateQuietly(['employee_data' => $employee_data]);
    }
}
