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
    protected $description = 'Send a Production report to Omma distro';
    /**
     * The config path to the distribution list;
     */
    protected string $distro_config_path = 'dainsys.ooma.distro';

    protected string $client = 'Omma';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->mail_subject = "Omma Daily Production Report";

        $this->campaign_name_prefix = '%INT%OOM%';

        $this->distro = $this->getDistroList();
    }
    /**
     * Initialize dates and other variables which can't be initialized from the constructor
     *
     * @return object
     */
    protected function bootOptionVariables(): object
    {
        $this->date_to = $this->option('date') == 'default' ?
            now()->subDay()->format('m/d/Y') :
            Carbon::parse($this->option('date'))->format('m/d/Y');


        $this->date_from =  $this->option('from') == 'default' ?
            $this->date_to :
            Carbon::parse($this->option('from'))->format('m/d/Y');

        return $this;
    }
}
