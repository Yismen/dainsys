<?php

namespace App\Services\RingCentral\Tables;

use App\Models\RingCentral\Calls;
use Illuminate\Database\Eloquent\Builder;

class CallsService extends AbstractRingCentralService
{
    public function baseQuery(): Builder
    {
        return Calls::query()
            ->selectRaw('
                SUM(duration) AS total_duration
                ,SUM(sec_on_hold) AS total_sec_on_hold
                ,SUM(agent_wait_time) AS total_agent_wait_time
                ,SUM(agent_wrap_time) AS total_agent_wrap_time
                ,SUM(calls) AS total_calls
                ,SUM(contacts) AS total_contacts
                ,SUM(sales) AS total_sales        
        ');
    }
}
