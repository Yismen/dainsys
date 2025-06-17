<?php

namespace App\Console\Commands\Inbound\Support;

use App\Console\Commands\Inbound\Sheets\SummaryPeriodInboundDataSheet;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class InboundPeriodSummaryExport implements WithMultipleSheets
{
    protected $period_name;

    public function __construct(/**
     * Array of hours
     */
    protected array $repo, /**
     * The client name
     */
    protected string $client, string $period_name, protected $date_from = null, protected $date_to = null)
    {
        $this->period_name = $period_name;
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
