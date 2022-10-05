<?php

namespace App\Listeners;

use App\Models\Report;
use App\Mail\EmployeeCreatedMail;
use Illuminate\Support\Facades\Mail;
use App\Events\EmployeeTerminated as Event;

class EmployeeCreatedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function handle($event)
    {
        $report = Report::query()->where('key', 'dainsys:employees-hired')->first();
        
        if ($report) {
            Mail::send(new EmployeeCreatedMail($event->employee, $report->mailableRecipients()));
        }
    }
}
