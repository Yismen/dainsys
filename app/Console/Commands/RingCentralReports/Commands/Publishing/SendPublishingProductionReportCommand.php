<?php

namespace App\Console\Commands\RingCentralReports\Commands\Publishing;

use App\Console\Commands\RingCentralReports\Commands\BaseProductionReportCommand;
use App\Console\Commands\RingCentralReports\Exports\ProductionReportExport;
use Maatwebsite\Excel\Facades\Excel;

class SendPublishingProductionReportCommand extends BaseProductionReportCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'publishing:send-production-report {--date=} {--from_date=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a roduction report to Publishing distro';

    public function handle()
    {
        $dates_range = $this->getDatesRange();
        $client_name = 'Publishing';
        $file_name = $this->getFileName($client_name, $dates_range);

        $report = new ProductionReportExport(
            $sheets = [
                \App\Console\Commands\RingCentralReports\Exports\Sheets\ProductionSheet::class,
                \App\Console\Commands\RingCentralReports\Exports\Sheets\DispositionsSheet::class,
            ],
            $client_name,
            $campaign_name = 'PUB%',
            $dates_range,
            $distro_array = $this->getDistroList($this->name),
            $team = 'ECC%',
            $subject_sufix = 'Hourly Production Report'
        );

        Excel::store($report, $file_name);

        $report->send($file_name);

        $this->info("{$client_name} Production Report Sent!");
    }
}
