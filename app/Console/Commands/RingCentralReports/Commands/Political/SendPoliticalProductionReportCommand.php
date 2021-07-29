<?php

namespace App\Console\Commands\RingCentralReports\Commands\Political;

use App\Console\Commands\RingCentralReports\Commands\BaseProductionReportCommand;
use App\Console\Commands\RingCentralReports\Exports\ProductionReportExport;
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
            $sheets = [
                \App\Console\Commands\RingCentralReports\Exports\Sheets\ProductionSheet::class,
                \App\Console\Commands\RingCentralReports\Exports\Sheets\DispositionsSheet::class,
            ],
            $client_name,
            $campaign_name = 'POL%',
            $dates_range,
            $distro_array = $this->getDistroList('dainsys.political.distro'),
            $team = 'ECC%',
            $subject_sufix = 'Hourly Production Report'
        );

        Excel::store($report, $file_name);

        $report->send($file_name);

        $this->info("{$client_name} Production Report Sent!");
    }
}
