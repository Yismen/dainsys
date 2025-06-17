<?php

namespace App\Listeners;

use App\Events\EmployeeCreated;
use App\Models\Process;

class AssignEmployeeToAutomaticProcesses
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
     *
     * @return void
     */
    public function handle(EmployeeCreated $event)
    {
        $employee = $event->employee;

        $processes_id = Process::query()
            ->where('default', true)
            ->whereDoesntHave('employees', function ($query) use ($employee): void {
                $query->where('id', $employee->id);
            })->pluck('id')->toArray();

        $employee->processes()->attach($processes_id);
    }
}
