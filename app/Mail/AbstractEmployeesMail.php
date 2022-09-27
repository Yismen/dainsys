<?php

namespace App\Mail;

use Carbon\Carbon;
use App\Models\Report;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

abstract class AbstractEmployeesMail extends Mailable implements ShouldQueue
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
}
