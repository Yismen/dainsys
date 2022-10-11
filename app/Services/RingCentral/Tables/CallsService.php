<?php

namespace App\Services\RingCentral\Tables;

use App\Models\RingCentral\Calls;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

class CallsService extends AbstractRingCentralService
{
    public function make(array $fields): Builder
    {
        return $this->build($fields, new Calls());
    }

    public function aggregates(): string
    {
        return DB::raw('
            SUM(duration) AS total_duration
            ,SUM(sec_on_hold) AS total_sec_on_hold
            ,SUM(agent_wait_time) AS total_agent_wait_time
            ,SUM(agent_wrap_time) AS total_agent_wrap_time
            ,SUM(calls) AS total_calls
            ,SUM(contacts) AS total_contacts
            ,SUM(sales) AS total_sales        
        ');
    }

    protected function defaultFields(): array
    {
        return [
            'agent_id', 'agent_name', 'date', 'dial_group_name', 'dial_group_prefix', 'queue', 'agent_disposition'
        ];
    }
}
