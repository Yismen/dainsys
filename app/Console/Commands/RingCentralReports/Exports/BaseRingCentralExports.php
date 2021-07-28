<?php

namespace App\Console\Commands\RingCentralReports\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

abstract class BaseRingCentralExports implements RingCentralExportsContract, WithMultipleSheets
{
    public string $client_name;

    public string $campaign_name;

    public array $dates_range;

    public array $distro_array;

    public string $team;

    public function __construct(string  $client_name, string $campaign_name, array $dates_range, array $distro_array, string $team = 'ECC%')
    {
        $this->client_name = $client_name;
        $this->campaign_name = $campaign_name;
        $this->dates_range = $dates_range;
        $this->distro_array = $distro_array;
        $this->team = $team;
    }

    public function send(array $distro, $mailable)
    {
        dd($this);
    }
}
