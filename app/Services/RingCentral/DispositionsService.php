<?php

namespace App\Services\RingCentral;

use App\Models\RingCentral\Disposition;
use Illuminate\Database\Eloquent\Builder;

class DispositionsService
{
    public function query(): Builder
    {
        return Disposition::query()
        ;
    }
}
