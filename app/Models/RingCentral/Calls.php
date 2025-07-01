<?php

namespace App\Models\RingCentral;

use App\Models\DainsysModel as Model;
use App\Models\RingCentral\Traits\WithRingCentralConnection;

class Calls extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;
    use WithRingCentralConnection;


    protected $primaryKey = 'agent_disposition';

    protected $keyType = 'string';

    public $incrementing = false;

    public function getTable()
    {
        return 'vw_ecco_combined_dialer_result_summary';
    }
}
