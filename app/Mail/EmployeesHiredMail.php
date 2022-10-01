<?php

namespace App\Mail;

use App\Exports\EmployeesHired;

class EmployeesHiredMail extends AbstractEmployeesMail
{
    protected $file_prefix = 'employees_hired_from_';

    protected $exporter = EmployeesHired::class;

    public function build()
    {
        return $this->getBuild();
    }
}
