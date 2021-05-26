<?php

namespace App\Console\Commands\Inbound;

use App\Console\Commands\Common\HourlyProductionReport\HourlyProductionReportTrait;
use App\Console\Commands\Common\Traits\NotifyUsersOnFailedCommandsTrait;
use Illuminate\Console\Command;

class SendDailySummaryCommand extends Command
{
    // use NotifyUsersOnFailedCommandsTrait;
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
    // protected string $distro_config_path = 'dainsys.political.distro';

    // protected string $client = 'Political';

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

        
    }
}
