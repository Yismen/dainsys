<?php

namespace App\Console\Commands\Ooma;

use App\Console\Commands\Common\HourlyProductionReport\HourlyProductionReportTrait;
use App\Console\Commands\Common\Traits\NotifyUsersOnFailedCommandsTrait;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SendDailyProductionReportCommand extends Command
{
    use NotifyUsersOnFailedCommandsTrait;
    use HourlyProductionReportTrait;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ooma:send-daily-production-report {--date=default} {--from=default}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a Production report to Ooma distro';
    /**
     * The config path to the distribution list;
     */
    protected string $distro_config_path = 'dainsys.ooma.distro';

    protected string $client = 'Ooma';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->mail_subject = "Ooma Daily Production Report";

        $this->campaign_name_prefix = '%INT%OOM%';

        $this->distro = $this->getDistroList();
    }
}
