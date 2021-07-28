<?php

namespace App\Console\Commands\RingCentralReports\Exports;

use Illuminate\Contracts\Mail\Mailable;

interface RingCentralExportsContract
{
    public function send(array $distro, Mailable $mailable);
}
