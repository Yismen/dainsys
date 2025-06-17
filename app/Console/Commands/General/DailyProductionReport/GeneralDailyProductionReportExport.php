<?php

namespace App\Console\Commands\General\DailyProductionReport;

use App\Console\Commands\General\GeneralDataSheet;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class GeneralDailyProductionReportExport implements WithMultipleSheets
{
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
                $this->repo->data
            );
        }

        return $sheets;
    }
}
