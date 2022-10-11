<?php

namespace App\Models\RingCentral;

use App\Models\DainsysModel as Model;
use App\Models\RingCentral\Traits\WithRingCentralConnection;

class SessionRaw extends Model
{
    use WithRingCentralConnection;

    public function getTable()
    {
        return 'vw_ecco_agent_session_raw_summary';
    }
}
