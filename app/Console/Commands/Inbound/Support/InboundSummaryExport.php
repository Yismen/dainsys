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

    public function __construct($repo, string $client = 'Kipany')
    {
        $this->repo = $repo;
        $this->client = $client;
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

                $sheets[] = new $sheetClass($value, $class_name);
            };
        }

        return $sheets;
    }
}
