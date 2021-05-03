<?php

namespace App\Console\Commands\General\DailyRawReport;

use App\Console\Commands\General\GeneralDataSheet;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class GeneralDailyRawReportExport implements WithMultipleSheets
{
    // use CapillusCommandsTrait;

    /**
     * Array of hours
     *
     * @var object
     */
    protected $repo;

    protected string $view_name = 'exports.data-raw';
    protected string $report_name = 'Daily Raw Report';

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
                $this->repo->data,
                $this->view_name,
                $this->report_name
            );
        }

        return $sheets;
    }
}
