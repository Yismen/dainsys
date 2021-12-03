<?php

namespace App\Console\Commands\RingCentralReports\Commands;

use Illuminate\Console\Command;

abstract class BaseProductionReportCommand extends Command
{
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Parse and return the distribution list for the email
     *
     * @return array
     */
    protected function getDistroList(string $config_key): array
    {
        $list = config($config_key) ??
            abort(404, 'Invalid distro list. Set it up in the .env, separated by pipe (|).');

        return (array) explode('|', $list);
    }

    /**
     * Returns the dates range form the report
     *
     * @return array
     */
    protected function getDatesRange(): array
    {
        $date = now(); // today

        $to_date = $this->option('date') ?
            $date->copy()->parse($this->option('date')) : // parse given date
            $date->copy(); // use today's date

        $from_date = $this->option('from_date') ?
            $date->copy()->parse($this->option('from_date')) : // parse given date
            $to_date->copy(); // use date option

        return [
            'from_date' => $from_date->format('Y-m-d'),
            'to_date' => $to_date->format('Y-m-d'),
        ];
    }

    protected function getFileName(string $client_name, array $dates_range): string
    {
        $now = now()->format('His');

        return "{$client_name} Production Report {$dates_range['from_date']}_{$dates_range['to_date']} {$now}.xlsx";
    }
}
