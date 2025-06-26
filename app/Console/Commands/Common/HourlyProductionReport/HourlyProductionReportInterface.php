<?php

namespace App\Console\Commands\Common\HourlyProductionReport;

interface HourlyProductionReportInterface
{
    /**
     * Get production data
     */
    public function getData(): object;

    /**
     * Get dispositions object
     */
    public function getDispositions(): object;

    /**
     * Fake the data to avoid api call
     *
     * @return object
     */
    public function getFakedData(): array;

    /**
     * Fake the dispositions to avoid api call
     *
     * @return object
     */
    public function getFakedDispositions(): array;
}
