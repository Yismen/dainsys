<?php

namespace App\Console\Commands\Publishing\HourlyProductionReport;

use App\Console\Commands\Common\HourlyProductionReport\Sheets\DataSheet;
use App\Console\Commands\Common\HourlyProductionReport\Sheets\DispositionsSheet;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class HourlyProductionReportExport implements WithMultipleSheets
{
    // use CapillusCommandsTrait;

    /**
     * Array of hours
     *
     * @var array
     */
    protected $repo;

    protected string $data_view;

    protected string $disposition_view;

    public function __construct($repo, string $data_view = 'exports.data', string $disposition_view = 'exports.dispositions')
    {
        $this->repo = $repo;
        $this->data_view = $data_view;
        $this->disposition_view = $disposition_view;
    }

    /**
     * @return array
     */
    public function sheets(): array
    {
        $sheets = [];
        $sheets[] = new DataSheet(
            $this->repo->data,
            "Publishing Production Report",
            "Publishing Hourly Production Report",
            $this->data_view
        );

        $sheets[] = new DispositionsSheet(
            $this->repo->dispositions,
            "Publishing Dispositions",
            "Publishing Hourly Dispositions Report",
            $this->disposition_view
        );

        return $sheets;
    }
}
