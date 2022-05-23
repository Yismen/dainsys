<?php

namespace App\Repositories;

use App\Models\Punch;

class PunchRepository
{
    public function latestPunch()
    {
        return Punch::orderBy('punch', 'desc')
            ->where('punch', 'like', '00%')
            ->first();
    }
}
