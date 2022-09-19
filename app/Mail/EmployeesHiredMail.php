<?php

namespace App\Mail;

use Carbon\Carbon;
use App\Models\Report;
use Illuminate\Mail\Mailable;
use App\Exports\EmployeesHired;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmployeesHiredMail extends Mailable implements ShouldQueue
{
    protected $site;
    protected $date_from;
    protected $date_to;

    protected string $report_key;

    public function __construct(string $report_key, string $dates, $site = '%')
    {
        $dates = preg_split('/[\s,|]/', $dates, -1, PREG_SPLIT_NO_EMPTY);
        $this->date_from = Carbon::parse($dates[0])->startOfDay();
        $this->date_to = Carbon::parse($dates[1] ?? $dates[0])->endOfDay();
        $this->site = $site;
        $this->report_key = $report_key;
    }

    public function build()
    {
        $file_name = 'employees_hired_from_' . $this->date_from->format('Y-m-d') . '_to_' . $this->date_to->format('Y-m-d') . '.xlsx';

        Excel::store(new EmployeesHired($this->date_from, $this->date_to), $file_name);
        $title = str($file_name)->beforeLast('.xlsx')->headline();

        // send
        $report = Report::query()->where('key', $this->report_key)->firstOrFail();

        return $this->markdown('emails.employees-hired', ['title' => $title])
            ->to($report->mailableRecipients())
            ->attachFromStorage($file_name)
            ->subject($title);
    }
}
