<?php

namespace App\Console\Commands\RingCentralReports\Exports\Sheets;

use App\Console\Commands\RingCentralReports\Exports\RingCentralExportsContract;
use App\Console\Commands\RingCentralReports\Exports\Support\Connections\ConnectionContract;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithPreCalculateFormulas;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Sheet;

abstract class BaseRingCentralSheet implements FromView, WithTitle, WithPreCalculateFormulas, WithEvents
{
    protected $data;

    public function __construct(protected RingCentralExportsContract $exporter)
    {
    }

    abstract public function getData(ConnectionContract $connection, string $date_from, string $date_to): array;

    abstract public function addSubTotals(int $totals_row, int $rows, Sheet $sheet_object);
}
