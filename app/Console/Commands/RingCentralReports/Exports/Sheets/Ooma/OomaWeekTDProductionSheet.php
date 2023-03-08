<?php

namespace App\Console\Commands\RingCentralReports\Exports\Sheets\Ooma;

use Carbon\Carbon;
use Illuminate\Contracts\View\View;

class OomaWeekTDProductionSheet extends BaseOomaProductionSheet
{
    protected $page_title = 'WTD';
    /**
     * Report this sheet if it has data. For some sheets it make no sense to send a report
     * if they are the only one with data.
     *
     * @var bool
     */
    protected $reportable = false;

    /**
     * @return View
     */
    public function view(): View
    {
        return $this->parseView(
            Carbon::parse($this->exporter->dates_range['from_date'])->startOfWeek()->format('Y-m-d'),
            $this->exporter->dates_range['to_date']
        );
    }
}
