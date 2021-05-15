<?php

namespace App\Console\Commands\Political;

use App\Console\Commands\Common\HourlyProductionReport\HourlyProductionReportTrait;
use App\Console\Commands\Common\Traits\NotifyUsersOnFailedCommandsTrait;
use Illuminate\Console\Command;

class SendPoliticalHourlyProductionReportCommand extends Command
{
    use NotifyUsersOnFailedCommandsTrait;
    use HourlyProductionReportTrait;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dainsys:political-send-hourly-production-report {--date=default} {--from=default}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a Hourly Production report to Political distro';
    /**
     * The config path to the distribution list;
     */
    protected string $distro_config_path = 'dainsys.political.distro';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->mail_subject = "Political Hourly Production Report";

        $this->campaign_name_prefix = 'POL';

        $this->distro = $this->getDistroList();
    }
}
