<?php

namespace App\Listeners;

use App\Events\EmployeeCreated;
use App\Models\Employee;

class CreateEmployeeSchedule
{
    protected $employee;

    /**
     * Create the event listener.
     */
    public function __construct(Employee $employee)
    {
        $this->employee = $employee;
    }

    /**
     * Handle the event.
     *
     * @param EmployeeCreated $event
     */
    public function handle(EmployeeCreated $event)
    {
    }
}
