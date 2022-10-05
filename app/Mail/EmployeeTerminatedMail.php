<?php

namespace App\Mail;

use App\Models\Report;
use App\Models\Employee;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmployeeTerminatedMail extends Mailable
{
    use Queueable;
    use SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public Employee $employee;

    protected string $report_key ;

    public function __construct(Employee $employee, string $report_key = 'dainsys:employees-terminated')
    {
        $this->employee = $employee;
        $this->report_key = $report_key;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $report = Report::query()->where('key', $this->report_key)->firstOrFail();

        return $this->markdown('mail.employee-terminated-mail', [
            'employee' => $this->employee->load('termination')
        ])
        ->to($report->mailableRecipients())
        ;
    }
}
