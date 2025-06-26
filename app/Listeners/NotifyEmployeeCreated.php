<?php

namespace App\Listeners;

use App\Mail\EmployeeCreatedMail;
use App\Models\Report;
use Illuminate\Support\Facades\Mail;

class NotifyEmployeeCreated
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct() {}

    public function handle($event)
    {
        $report = Report::query()->where('key', 'dainsys:employees-hired')->first();

        if ($report) {
            Mail::send(new EmployeeCreatedMail($event->employee, $report->mailableRecipients()));
        }
    }
}
