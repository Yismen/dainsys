<?php

namespace App\Services\RingCentral;

use App\Models\RingCentral\Calls;
use Illuminate\Database\Eloquent\Builder;

class DispositionsPendingIdentificationService
{
    public function query(): Builder
    {
        return Calls::query()
            ->where('sales', null)
            ->select(['agent_disposition', 'dial_group_prefix'])
            ->selectRaw('count(*) as records')
            ->groupBy(['agent_disposition', 'dial_group_prefix']);
    }
}
