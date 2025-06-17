<?php

namespace App\Console\Commands\Common\HourlyProductionReport;

use App\Console\Commands\Common\HourlyProductionReport\Sheets\DataSheet;
use App\Console\Commands\Common\HourlyProductionReport\Sheets\DispositionsSheet;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class HourlyProductionReportExport implements WithMultipleSheets
{
    /**
     * @param object $repo
     */
    public function __construct(
        /**
         * Array of hours
         */
        protected object $repo,
        protected string $client = 'Publishing',
        protected string $data_view = 'exports.data',
        protected string $disposition_view = 'exports.dispositions'
    )
    {
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
            "{$this->client} Production Report",
            $this->data_view
        );

        $sheets[] = new DispositionsSheet(
            $this->repo->dispositions,
            "{$this->client} Dispositions",
            "{$this->client} Dispositions Report",
            $this->disposition_view
        );

        return $sheets;
    }
}
