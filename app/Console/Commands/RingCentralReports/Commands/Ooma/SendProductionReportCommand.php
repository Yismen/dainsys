<?php

namespace App\Console\Commands\RingCentralReports\Commands\Ooma;

use App\Console\Commands\RingCentralReports\Commands\BaseProductionReportCommand;
use App\Console\Commands\RingCentralReports\Exports\Support\ProductionReportExport;
use Maatwebsite\Excel\Facades\Excel;

class SendProductionReportCommand extends BaseProductionReportCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ooma:send-production-report {--date=} {--from_date=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a roduction report to Ooma distro';


    public function handle()
    {
        $dates_range = $this->getDatesRange();
        $client_name = 'Ooma';
        $file_name = "{$client_name} Production Report {$dates_range['from_date']}_{$dates_range['to_date']}.xlsx";

        $report = new ProductionReportExport(
            $client_name,
            $campaign_name = '%INT%OOM%',
            $dates_range,
            $distro_array = $this->getDistroList('dainsys.ooma.distro'),
            $team = 'ECC%'
        );

        Excel::store($report, $file_name);

        $report->send($file_name);

        $this->info("{$client_name} Production Report Sent!");
    }
}
