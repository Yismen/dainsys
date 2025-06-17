<?php

namespace App\Console\Commands\Inbound\Support;

use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class InboundSummaryExport implements WithMultipleSheets
{
    public function __construct(
        /**
         * Array of hours
         */
        protected array $repo,
        /**
         * The client name
         */
        protected string $client = 'Kipany',
        protected $date_from = null,
        protected $date_to = null
    ) {}

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
