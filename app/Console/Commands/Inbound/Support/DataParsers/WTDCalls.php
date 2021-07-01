<?php

namespace App\Console\Commands\Inbound\Support\DataParsers;

class WTDCalls extends DataParsersContract
{
    public static function handle(string $date_from, string $date_to, string $team = 'ECC%', $gate = '%')
    {
        return self::getInboundData($group_fields = [
            'agent_fname',
            'agent_lname',
            // 'call_date',
            // 'gate_name',
            'agent_group_name',
            // 'agent_username',
        ], $date_from, $date_to, $team = 'ECC%', $gate = '%');
    }
}
