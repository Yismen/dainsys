<?php

namespace App\Mail;

use Carbon\Carbon;
use App\Models\Report;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Queue\SerializesModels;

abstract class AbstractEmployeesMail extends Mailable
{
    use Queueable;
    use SerializesModels;

    protected $site;
    protected $date_from;
    protected $date_to;

    protected $report;
    protected $recipients;

    protected string $report_key;

    public function __construct(string $report_key, string $dates, $site = '%')
    {
        $dates = preg_split('/[\s,|]/', $dates, -1, PREG_SPLIT_NO_EMPTY);
        $this->date_from = Carbon::parse($dates[0])->startOfDay();
        $this->date_to = Carbon::parse($dates[1] ?? $dates[0])->endOfDay();
        $this->site = $site;
        $this->report_key = $report_key;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to('yjorge@eccocorpbpo.com')
            ->subject($this->title)
            ->markdown($this->markdown);
    }

    public function getRecipients(): array
    {
        $report = Report::query()->where('key', $this->report_key)->firstOrFail();

        return $report->mailableRecipients();
    }

    protected function getFileName()
    {
        return $this->file_prefix . $this->date_from->format('Y-m-d') . '_to_' . $this->date_to->format('Y-m-d') . '.xlsx';
    }

    protected function getMailTitle()
    {
        return join(' ', [
            str($this->file_prefix)->headline(),
            $this->date_from->format('Y-m-d'),
            'To',
            $this->date_to->format('Y-m-d')
        ]);
    }

    protected function getBuild()
    {
        $file_name = $this->getFileName();

        Excel::store(new $this->exporter($this->date_from, $this->date_to), $file_name);

        $title = $this->getMailTitle();

        $recipients = $this->getRecipients();

        return $this->markdown('emails.employees', ['title' => $title])
            ->to($recipients)
            ->attachFromStorage($file_name)
            ->subject($title);
    }
}
