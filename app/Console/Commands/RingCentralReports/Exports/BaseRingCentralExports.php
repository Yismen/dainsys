<?php

namespace App\Console\Commands\RingCentralReports\Exports;

use App\Console\Commands\RingCentralReports\Exports\Support\Mails\BaseRingCentralMails;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

abstract class BaseRingCentralExports implements RingCentralExportsContract, WithMultipleSheets
{
    public bool $has_data = false;

    public bool $data_is_new = false;

    public function __construct(public array $sheets, public string $client_name, public string $campaign_name, public array $dates_range, public array $distro_array, public string $team = 'ECC%', public string $subject_sufix = 'Production Report') {}

    public function send(string $file_name)
    {
        if ($this->has_data && $this->data_is_new) {
            Mail::send(new BaseRingCentralMails(
                $this->distro_array,
                $file_name,
                "{$this->client_name} {$this->subject_sufix}"
            ));
        }

        $this->removeFile($file_name);
    }

    protected function removeFile($file_name)
    {
        if (Storage::exists($file_name)) {
            Storage::delete($file_name);
        }
    }
}
