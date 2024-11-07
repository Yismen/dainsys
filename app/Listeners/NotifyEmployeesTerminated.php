<?php

namespace App\Listeners;

use App\Models\Report;
use App\Events\EmployeeTerminated;
use App\Mail\EmployeeTerminatedMail;
use Illuminate\Support\Facades\Mail;

class NotifyEmployeesTerminated
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
        $report = Report::query()->where('key', 'dainsys:employees-terminated')->first();

        if ($report) {
            Mail::send(new EmployeeTerminatedMail($event->employee, $report->mailableRecipients()));
        }
    }
}
