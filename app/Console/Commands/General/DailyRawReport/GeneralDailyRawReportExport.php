<?php

namespace App\Console\Commands\General\DailyRawReport;

use App\Console\Commands\General\GeneralDataSheet;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class GeneralDailyRawReportExport implements WithMultipleSheets
{
    protected string $view_name = 'exports.data-raw';
    protected string $report_name = 'Daily Raw Report';

    /**
     * @param object $repo
     */
    public function __construct(
        /**
         * Array of hours
         */
        protected $repo
    )
    {
    }

    /**
     * @return array
     */
    public function sheets(): array
    {
        $sheets = [];

        if (count($this->repo->data) > 0) {
            $sheets[] = new GeneralDataSheet(
                $this->repo->data,
                $this->view_name,
                $this->report_name
            );
        }

        return $sheets;
    }
}
