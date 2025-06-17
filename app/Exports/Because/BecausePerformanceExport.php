<?php

namespace App\Exports\Because;

use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class BecausePerformanceExport implements WithMultipleSheets
{
    public function __construct(Carbon $date)
    {
        $this->date = $date;
    }

    public function sheets(): array
    {
        $sheets = [];

        $sheets[] = new BecausePerformanceReportExport(['date' => $this->date, 'campaign' => '%']);

        foreach ($this->becauseCampaigns() as $campaign) {
            $sheets[] = new BecausePerformanceReportExport(['date' => $this->date, 'campaign' => $campaign]);
        }

        return $sheets;
    }
}
