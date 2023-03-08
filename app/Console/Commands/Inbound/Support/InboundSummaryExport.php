<?php

namespace App\Console\Commands\Inbound\Support;

use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class InboundSummaryExport implements WithMultipleSheets
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

    public function __construct($repo, string $client = 'Kipany', $date_from = null, $date_to = null)
    {
        $this->repo = $repo;
        $this->client = $client;
        $this->date_from = $date_from;
        $this->date_to = $date_to;
    }

    /**
     * @return array
     */
    public function sheets(): array
    {
        $sheets = [];

        foreach ($this->repo['data'] as $key => $value) {
            if (count($value) > 0) {
                $class_name = Str::studly($key);
                $sheetClass = "\\App\\Console\\Commands\\Inbound\\Sheets\\{$class_name}";

                $sheets[] = new $sheetClass($value, $class_name, $this->date_from, $this->date_to);
            }
        }

        return $sheets;
    }
}
