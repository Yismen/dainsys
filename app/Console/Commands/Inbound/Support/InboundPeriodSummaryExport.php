<?php

namespace App\Console\Commands\Inbound\Support;

use App\Console\Commands\Inbound\Sheets\SummaryPeriodInboundDataSheet;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class InboundPeriodSummaryExport implements WithMultipleSheets
{
    /**
     * Array of hours
     */
    protected array $repo;
    /**
     * The client name
     */
    protected string $client;

    protected $date_from;

    protected $date_to;

    protected $period_name;

    public function __construct($repo, string $client = 'Kipany', string $period_name, $date_from = null, $date_to = null)
    {
        $this->repo = $repo;
        $this->client = $client;
        $this->period_name = $period_name;
        $this->date_from = $date_from;
        $this->date_to = $date_to;
    }

    /**
     * @return array
     */
    public function sheets(): array
    {
        $sheets = [];

        $sheets[] = new SummaryPeriodInboundDataSheet(
            $this->repo['data'],
            $this->client,
            $this->period_name,
            $this->date_from,
            $this->date_to
        );


        return $sheets;
    }
}
