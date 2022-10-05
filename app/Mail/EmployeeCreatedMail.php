<?php

namespace App\Mail;

use App\Models\Employee;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmployeeCreatedMail extends Mailable
{
    use Queueable;
    use SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public Employee $employee;

    protected array $recipients ;

    public function __construct(Employee $employee, array $recipients)
    {
        $this->employee = $employee;
        $this->recipients = $recipients;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.employee-created-mail', [
            'employee' => $this->employee
        ])
        ->to($this->recipients)
        ;
    }
}
