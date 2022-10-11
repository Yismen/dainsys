<?php

namespace App\Models\RingCentral;

use App\Models\DainsysModel as Model;
use App\Models\RingCentral\Traits\WithRingCentralConnection;

class Calls extends Model
{
    use WithRingCentralConnection;

    public function getTable()
    {
        return 'vw_ecco_combined_dialer_result_summary';
    }
}
