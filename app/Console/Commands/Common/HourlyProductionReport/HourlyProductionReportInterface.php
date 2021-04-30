<?php

namespace App\Console\Commands\Common\HourlyProductionReport;

interface HourlyProductionReportInterface
{
    /**
     * Get production data
     *
     * @return object
     */
    public function getData(): object;
    /**
     * Get dispositions object
     *
     * @return object
     */
    public function getDispositions(): object;
}
