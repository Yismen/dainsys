<?php

namespace App\Listeners;

use App\Models\Process;
use App\Events\EmployeeCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AssignEmployeeToAutomaticProcesses
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
     * @param  \App\Events\EmployeeCreated  $event
     * @return void
     */
    public function handle(EmployeeCreated $event)
    {
        $employee = $event->employee;

        $processes_id = Process::query()
            ->where('default', true)
            ->whereDoesntHave('employees', function ($query) use ($employee) {
                $query->where('id', $employee->id);
            })->pluck('id')->toArray();

        $employee->processes()->attach($processes_id);
    }
}
