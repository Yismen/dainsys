<?php

namespace App\Console\Commands\Common\HourlyProductionReport;

use App\Console\Commands\Common\HourlyProductionReport\Sheets\DataSheet;
use App\Console\Commands\Common\HourlyProductionReport\Sheets\DispositionsSheet;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class HourlyProductionReportExport implements WithMultipleSheets
{
    // use CapillusCommandsTrait;

    /**
     * Array of hours
     *
     * @var object
     */
    protected object $repo;

    protected string $client;

    protected string $data_view;

    protected string $disposition_view;

    public function __construct(
        $repo,
        string $client = 'Publishing',
        string $data_view = 'exports.data',
        string $disposition_view = 'exports.dispositions'
    ) {
        $this->repo = $repo;
        $this->client = $client;
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
            "{$this->client} Production Report",
            "{$this->client} Hourly Production Report",
            $this->data_view
        );

        $sheets[] = new DispositionsSheet(
            $this->repo->dispositions,
            "{$this->client} Dispositions",
            "{$this->client} Hourly Dispositions Report",
            $this->disposition_view
        );

        return $sheets;
    }
}
