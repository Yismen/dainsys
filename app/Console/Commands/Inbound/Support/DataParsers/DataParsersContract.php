<?php

namespace App\Console\Commands\Inbound\Support\DataParsers;

use App\Console\Commands\Inbound\Support\InboundSummaryRepository;

abstract class DataParsersContract
{
    abstract public static function handle(string $date_from, string $date_to, string $team = 'ECC%', $gate = '%');

    protected static function getInboundData($group_fields, $date_from, $date_to, $team, $gate)
    {
        $repo = new InboundSummaryRepository($date_from, $date_to, $team, $gate);

        return $repo->getInboundData($group_fields);
    }
}
