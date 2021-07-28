<?php

namespace App\Console\Commands\RingCentralReports\Exports;

interface RingCentralExportsContract
{
    public function send(string $file_name);
}
