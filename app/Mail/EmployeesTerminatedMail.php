<?php

namespace App\Mail;

use App\Termination;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;

class EmployeesTerminatedMail extends EmployeesBaseMail
{
    use Queueable;
    use SerializesModels;
    /**
     * Create a new message instance.
     */
    protected $site;

    public function __construct(int $months, $site = '%')
    {
        $this->months = (int) $months;

        $this->markdown = 'emails.employees-terminated';
        $this->site = $site;

        $this->title = 'Employees Terminated ' . ($months > 1 ? "Last {$months} Months" : 'This Month');

        $this->employees = $this->getEmployees();
    }

    protected function getEmployees()
    {
        $startOfMonth = Carbon::now()->subMonths($this->months)->startOfMonth();

        return Termination::orderBy('termination_date', 'DESC')
            ->where('termination_date', '>=', $startOfMonth)
            ->whereHas('employee', function ($query) {
                $query->whereHas('site', function ($query) {
                    $query->where('name', 'like', $this->site);
                });
            })
            ->with([
                'terminationType',
                'terminationReason',
                'employee',
            ])
            ->get();
    }
}
