<?php

namespace App\Console\Commands\RingCentralReports\Commands\Political;

use App\Console\Commands\RingCentralReports\Commands\BaseProductionReportCommand;
use App\Console\Commands\RingCentralReports\Exports\Support\ProductionReportExport;
use Maatwebsite\Excel\Facades\Excel;

class SendPoliticalProductionReportCommand extends BaseProductionReportCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'political:send-production-report {--date=} {--from_date=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a roduction report to Political distro';


    public function handle()
    {
        $dates_range = $this->getDatesRange();
        $client_name = 'Political';
        $file_name = $this->getFileName($client_name, $dates_range);

        $report = new ProductionReportExport(
            $client_name,
            $campaign_name = 'POL%',
            $dates_range,
            $distro_array = $this->getDistroList('dainsys.political.distro'),
            $team = 'ECC%'
        );

        Excel::store($report, $file_name);

        $report->send($file_name);

        $this->info("{$client_name} Production Report Sent!");
    }
}
