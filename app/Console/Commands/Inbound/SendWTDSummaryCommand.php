<?php

namespace App\Console\Commands\Inbound;

use App\Console\Commands\Common\Traits\NotifyUsersOnFailedCommandsTrait;
use App\Console\Commands\Inbound\Support\InboundDataRepository;
use App\Console\Commands\Inbound\Support\InboundPeriodSummaryExport;
use App\Mail\CommandsBaseMail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class SendWTDSummaryCommand extends Command
{
    use NotifyUsersOnFailedCommandsTrait;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'inbound:send-wtd-summary {--date=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a wtd summary report for Kipany inbound calls';
    /**
     * The config path to the distribution list;
     */
    protected string $distro_config_path = 'dainsys.inbound.distro';

    protected string $client = 'Kipany';

    protected $date_from;
    protected $date_to;

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
     * Handle the command
     *
     * @return void
     */
    public function handle()
    {
        $date = now();
        $mail_subject = 'Kipany Inbound WTD Report';
        $file_name = $mail_subject . ' ' . now()->format('Ymd_His') . '.xlsx';
        $distro = $this->getDistroList();

        $this->date_to = $this->option('date') ?
            $date->copy()->parse($this->option('date'))->format('m/d/Y') :
            $date->copy()->subDay()->format('m/d/Y');

        $this->date_from = $date->copy()->parse($this->date_to)->startOfWeek()->format('m/d/Y');

        $repo['data'] = InboundDataRepository::getData(
            $this->date_from,
            $this->date_to,
            $data_parsers = [
                \App\Console\Commands\Inbound\Support\DataParsers\Periods\PeriodHoursParser::class,
                \App\Console\Commands\Inbound\Support\DataParsers\Periods\PeriodCallsParser::class,
            ],
            $team = 'ECC%',
            $gate = 'HTL%'
        );

        if ($this->hasAnyData((array) $repo['data'])) {
            Excel::store(
                new InboundPeriodSummaryExport(
                    $repo,
                    $this->client,
                    $period_name = 'WTD',
                    $this->date_from,
                    $this->date_to
                ),
                $file_name
            );

            Mail::send(
                new CommandsBaseMail($distro, $file_name, $mail_subject)
            );

            $this->info("{$mail_subject} sent!");
        } else {
            $this->warn('No data for this date. Nothing sent.');
        }
    }

    /**
     * Get the distribution list from the config and explode it into an array
     *
     * @return array
     */
    protected function getDistroList(): array
    {
        $list = config($this->distro_config_path) ??
            abort(404, 'Invalid distro list. Set it up in the .env, separated by pipe (|).');

        return explode('|', $list);
    }

    /**
     * Check if any of the data arrays have at least one row.
     *
     * @param array $data
     * @return boolean
     */
    protected function hasAnyData(array $data): bool
    {
        foreach ($data as $value) {
            if (count($value) > 0 || !empty($value)) {
                return true;
            };
        }

        return false;
    }
}
