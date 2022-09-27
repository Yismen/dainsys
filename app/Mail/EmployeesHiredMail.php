<?php

namespace App\Mail;

use App\Exports\EmployeesHired;
use Maatwebsite\Excel\Facades\Excel;

class EmployeesHiredMail extends AbstractEmployeesMail
{
    public function build()
    {
        $file_name = 'employees_hired_from_' . $this->date_from->format('Y-m-d') . '_to_' . $this->date_to->format('Y-m-d') . '.xlsx';

        $file = Excel::store(new EmployeesHired($this->date_from, $this->date_to), $file_name);
        
        $title = str($file_name)->beforeLast('.xlsx')->headline();

        $recipients = $this->getRecipients();

        return $this->markdown('emails.employees', ['title' => $title])
            ->to($recipients)
            ->attachFromStorage($file_name)
            ->subject($title);
    }
}
