<?php

namespace App\Listeners;

use App\Events\EmployeeTerminated;
use App\Mail\EmployeeTerminatedMail;
use App\Models\Report;
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
