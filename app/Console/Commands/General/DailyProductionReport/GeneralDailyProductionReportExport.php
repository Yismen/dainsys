<?php

namespace App\Console\Commands\General\DailyProductionReport;

use App\Console\Commands\General\GeneralDataSheet;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class GeneralDailyProductionReportExport implements WithMultipleSheets
{
    // use CapillusCommandsTrait;

    /**
     * Array of hours
     *
     * @var object
     */
    protected $repo;

    public function __construct($repo)
    {
        $this->repo = $repo;
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
