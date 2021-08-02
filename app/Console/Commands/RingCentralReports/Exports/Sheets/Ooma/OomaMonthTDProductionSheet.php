<?php

namespace App\Console\Commands\RingCentralReports\Exports\Sheets\Ooma;

use App\Console\Commands\RingCentralReports\Exports\Support\Connections\RingCentralConnection;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;

class OomaMonthTDProductionSheet extends BaseOomaProductionSheet
{
    protected $page_title = 'MTD';
    /**
     * Report this sheet if it has data. For some sheets it make no sense to send a report
     * if they are the only one with data.
     *
     * @var boolean
     */
    protected $reportable = false;
    /**
     * @return View
     */
    public function view(): View
    {
        return $this->parseView(
            Carbon::parse($this->exporter->dates_range['from_date'])->startOfMonth()->format('Y-m-d'),
            $this->exporter->dates_range['to_date']
        );
    }
}
