<?php

namespace App\Console\Commands\RingCentralReports\Exports\Support;

use App\Console\Commands\RingCentralReports\Exports\BaseRingCentralExports;

class ProductionReportExport extends BaseRingCentralExports
{
    protected array $sheets = [
        \App\Console\Commands\RingCentralReports\Exports\Sheets\ProductionSheet::class
    ];

    /**
     * @return array
     */
    public function sheets(): array
    {
        $sheets = [];

        foreach ($this->sheets as $sheet) {
            $sheets[] = new $sheet($this);
        }

        return $sheets;
    }
}
