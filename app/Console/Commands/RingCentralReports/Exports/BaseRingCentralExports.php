<?php

namespace App\Console\Commands\RingCentralReports\Exports;

use App\Console\Commands\RingCentralReports\Exports\Support\Mails\BaseRingCentralMails;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

abstract class BaseRingCentralExports implements RingCentralExportsContract, WithMultipleSheets
{
    public bool $has_data = false;

    public string $client_name;

    public string $campaign_name;

    public array $dates_range;

    public array $distro_array;

    public string $team;

    public array $sheets;

    public function __construct(array $sheets, string $client_name, string $campaign_name, array $dates_range, array $distro_array, string $team = 'ECC%')
    {
        $this->sheets = $sheets;
        $this->client_name = $client_name;
        $this->campaign_name = $campaign_name;
        $this->dates_range = $dates_range;
        $this->distro_array = $distro_array;
        $this->team = $team;
    }

    public function send(string $file_name)
    {
        if ($this->has_data) {
            Mail::send(new BaseRingCentralMails(
                $this->distro_array,
                $file_name,
                "{$this->client_name} Production Report"
            ));
        };
    }
}
