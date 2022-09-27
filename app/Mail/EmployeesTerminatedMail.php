<?php

namespace App\Mail;

use App\Exports\EmployeesTerminated;
use Maatwebsite\Excel\Facades\Excel;

class EmployeesTerminatedMail extends AbstractEmployeesMail
{
    public function build()
    {
        $file_name = 'employees_terminated_from_' . $this->date_from->format('Y-m-d') . '_to_' . $this->date_to->format('Y-m-d') . '.xlsx';

        $file = Excel::store(new EmployeesTerminated($this->date_from, $this->date_to), $file_name);

        $title = str($file_name)->beforeLast('.xlsx')->headline();

        $recipients = $this->getRecipients();

        return $this->markdown('emails.employees', ['title' => $title])
            ->to($recipients)
            ->attachFromStorage($file_name)
            ->subject($title);
    }
}
