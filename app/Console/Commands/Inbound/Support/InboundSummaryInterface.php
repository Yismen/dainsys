<?php

namespace App\Console\Commands\Inbound\Support;

interface InboundSummaryInterface
{
    /**
     * Get production data
     */
    public function getInboundData(): array;

    /**
     * Get dispositions object
     *
     * @return object
     */
    public function getHoursData(): array;

    /**
     * Fake the data to avoid api call
     *
     * @return object
     */
    public function getFakedInbound(): array;

    /**
     * Fake the dispositions to avoid api call
     *
     * @return object
     */
    public function getFakedHours(): array;
}
