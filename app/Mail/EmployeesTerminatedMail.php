<?php

namespace App\Mail;

use App\Exports\EmployeesTerminated;

class EmployeesTerminatedMail extends AbstractEmployeesMail
{
    protected $file_prefix = 'employees_terminated_from_';

    protected $exporter = EmployeesTerminated::class;

    public function build()
    {
        return $this->getBuild();
    }
}
