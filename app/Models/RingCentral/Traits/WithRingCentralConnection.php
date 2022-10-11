<?php

namespace App\Models\RingCentral\Traits;

trait WithRingCentralConnection
{
    public function getConnectionName()
    {
        return 'poliscript';
    }
}
