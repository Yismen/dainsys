<?php

namespace App\Mail;

use App\Models\Employee;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

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

    public function __construct(Employee $employee, protected array $recipients)
    {
        $this->employee = $employee->load([
            'site',
            'project',
            'position',
        ]);
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
            ->to($this->recipients);
    }
}
