<?php

namespace App\Console\Commands\Publishing;

use App\Console\Commands\Common\HourlyProductionReport\HourlyProductionReportTrait;
use App\Console\Commands\Common\Traits\NotifyUsersOnFailedCommandsTrait;
use Illuminate\Console\Command;

class SendPublishingHourlyProductionReportCommand extends Command
{
    use NotifyUsersOnFailedCommandsTrait;
    use HourlyProductionReportTrait;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dainsys:publishing-send-hourly-production-report {--date=default} {--from=default}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a Hourly Production report to Publishing distro';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->mail_subject = "Publishing Hourly Production Report";

        $this->campaign_name_prefix = 'PUB';

        $this->distro = $this->getDistroList();
    }
}
