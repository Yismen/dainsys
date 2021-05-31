<?php

namespace App\Console\Commands\Inbound\Support\DataParsers;

class DispositionsByGate extends DataParsersContract
{
    public static function handle(string $date_from, string $date_to, string $team = 'ECC%', $gate = '%')
    {
        return self::getInboundData($group_fields = [
            'call_date',
            'gate_name',
            'agent_disposition',
        ], $date_from, $date_to, $team = 'ECC%', $gate = '%');
    }
}
