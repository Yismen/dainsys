<?php

namespace App\Console\Commands\Inbound;

use App\Console\Commands\Common\HourlyProductionReport\HourlyProductionReportTrait;
use App\Console\Commands\Common\Traits\NotifyUsersOnFailedCommandsTrait;
use App\Console\Commands\Inbound\Support\InboundDataRepository;
use App\Console\Commands\Inbound\Support\InboundSummaryExport;
use App\Console\Commands\Inbound\Support\InboundSummaryRepository;
use App\Mail\CommandsBaseMail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use phpDocumentor\Reflection\Types\This;

class SendDailySummaryCommand extends Command
{
    use NotifyUsersOnFailedCommandsTrait;
    // use HourlyProductionReportTrait;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'inbound:send-daily-summary {--date} {--from}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send ';
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

        // $this->mail_subject = "Political Hourly Production Report";

        // $this->campaign_name_prefix = 'POL';

        // $this->distro = $this->getDistroList();
    }

    public function handle()
    {
        $this->info('Daily Inbound Summary Sent');
        $date = now()->subDay();
        $mail_subject = 'Kipany Daily Report';
        $file_name = $mail_subject . " " . now()->format('Ymd_His') . ".xlsx";
        $distro = $this->getDistroList();

        $this->date_to = !$this->option('date') ?
            $date->format('m/d/Y') :
            $date->parse($this->option('date'))->format('m/d/Y');


        $this->date_from = !$this->option('from') ?
            $this->date_to :
            $date->parse($this->option('from'))->format('m/d/Y');

        $repo['data'] = InboundDataRepository::getData(
            $this->date_from,
            $this->date_to,
            $fields = [
                'by_employee',
                'dispositions_by_gate',
                'dispositions_by_employee',
                // 'hours_data',
            ]
        );

        Excel::store(
            new InboundSummaryExport(
                $repo,
                $this->client
            ),
            $file_name
        );

        Mail::send(
            new CommandsBaseMail($distro, $file_name, $mail_subject)
        );

        $this->report_message = "{$mail_subject} sent!";
    }


    /**
     * Get the distribution list from the config and explode it into an array
     *
     * @return array
     */
    protected function getDistroList(): array
    {
        $list = config($this->distro_config_path) ??
            abort(404, "Invalid distro list. Set it up in the .env, separated by pipe (|).");

        return explode("|", $list);
    }
}
