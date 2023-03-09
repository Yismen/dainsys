<?php

namespace App\Console\Commands\RingCentralReports\Exports\Sheets\Ooma;

use Illuminate\Contracts\View\View;

class OomaDailyProductionSheet extends BaseOomaProductionSheet
{
    protected $page_title = 'Daily';
    /**
     * Report this sheet if it has data. For some sheets it make no sense to send a report
     * if they are the only one with data.
     *
     * @var bool
     */
    protected $reportable = true;

    /**
     * @return View
     */
    public function view(): View
    {
        return $this->parseView(
            $this->exporter->dates_range['from_date'],
            $this->exporter->dates_range['to_date']
        );
    }
}
