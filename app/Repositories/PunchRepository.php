<?php

namespace App\Repositories;

use App\Models\Punch;

class PunchRepository
{
    public function nextPunchId()
    {
        $punch = Punch::query()
            ->orderBy('punch', 'desc')
            ->whereRaw('length(punch) = ?', 4)
            ->first();

        return str(++$punch->punch)->padLeft(4, '0');
    }
}
