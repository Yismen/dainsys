<?php

namespace App\Console\Commands\RingCentralReports\Exports;

class ProductionReportExport extends BaseRingCentralExports
{
    public function sheets(): array
    {
        $sheets = [];

        foreach ($this->sheets as $sheet) {
            $sheets[] = new $sheet($this);
        }

        return $sheets;
    }
}
