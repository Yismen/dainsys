<?php

namespace App\Listeners;

use App\Events\EmployeeCreated;
use App\Models\Employee;

class CreateEmployeeShift
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
     */
    public function handle(EmployeeCreated $event) {}
}
