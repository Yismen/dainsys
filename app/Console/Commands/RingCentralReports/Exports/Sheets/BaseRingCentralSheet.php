<?php

namespace App\Console\Commands\RingCentralReports\Exports\Sheets;

use Maatwebsite\Excel\Sheet;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithPreCalculateFormulas;
use App\Console\Commands\RingCentralReports\Exports\RingCentralExportsContract;
use App\Console\Commands\RingCentralReports\Exports\Support\Connections\ConnectionContract;

abstract class BaseRingCentralSheet implements FromView, WithTitle, WithPreCalculateFormulas, WithEvents
{
    protected RingCentralExportsContract $exporter;
    protected $data;

    public function __construct(RingCentralExportsContract $exporter)
    {
        $this->exporter = $exporter;
    }

    abstract public function getData(ConnectionContract $connection, string $date_from, string $date_to): array;

    abstract public function addSubTotals(int $totals_row, int $rows, Sheet $sheet_object);
}
