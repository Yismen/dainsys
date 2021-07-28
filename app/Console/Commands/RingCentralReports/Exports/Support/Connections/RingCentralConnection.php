<?php

namespace App\Console\Commands\RingCentralReports\Exports\Support\Connections;

use Illuminate\Support\Facades\DB;

class RingCentralConnection implements ConnectionContract
{
    public function connect()
    {
        return DB::connection('poliscript');
    }
}
