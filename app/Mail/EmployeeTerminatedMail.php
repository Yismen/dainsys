<?php

namespace App\Mail;

use App\Models\Employee;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * EmployeeTerminatedMail
 */
class EmployeeTerminatedMail extends Mailable implements ShouldQueue
{
    use Queueable;
    use SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public Employee $employee;

    protected array $recipients;

    public function __construct(Employee $employee, array $recipients)
    {
        $this->employee = $employee->load([
            'site',
            'project',
            'position'
        ]);

        $this->recipients = $recipients;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.employee-terminated-mail', [
            'employee' => $this->employee->load('termination'),
        ])
            ->to($this->recipients)
        ;
    }
}
