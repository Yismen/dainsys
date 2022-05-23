<?php

namespace App\Mail;

use App\Models\Employee;
use Carbon\Carbon;

class EmployeesHiredMail extends EmployeesBaseMail
{
    protected $site;

    public function __construct(int $months, $site = '%')
    {
        $this->months = (int) $months;
        $this->site = $site;

        $this->markdown = 'emails.employees-hired';

        // $months = $months + 1;
        $this->title = 'Employees Hired ' . ($months > 1 ? "Last {$months} Months" : 'This Month');

        $this->employees = $this->getEmployees();
    }

    protected function getEmployees()
    {
        return Employee::whereDate('hire_date', '>=', Carbon::now()->subMonths($this->months)->startOfMonth())
            ->orderBy('hire_date', 'DESC')
            ->orderBy('site_id')
            ->sorted()
            ->whereHas('site', function ($query) {
                $query->where('name', 'like', $this->site);
            })
            ->with([
                'termination',
                'supervisor',
                'project',
                'site',
            ])
            ->with(['position' => function ($query) {
                return $query->with(['department', 'payment_type']);
            }])
            ->get();
    }
}
