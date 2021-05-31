<?php

namespace App\Console\Commands\Inbound\Support\DataParsers;

use App\Console\Commands\Inbound\Support\InboundSummaryRepository;

class HoursData extends DataParsersContract
{
    public static function handle(string $date_from, string $date_to, string $team = 'ECC%', $gate = '%')
    {
        $repo = new InboundSummaryRepository($date_from, $date_to,  $team, $gate);

        return $repo->getHoursData();
    }
}
