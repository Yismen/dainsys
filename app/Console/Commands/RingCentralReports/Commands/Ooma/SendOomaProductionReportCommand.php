<?php

namespace App\Console\Commands\RingCentralReports\Commands\Ooma;

use App\Console\Commands\RingCentralReports\Commands\BaseProductionReportCommand;
use App\Console\Commands\RingCentralReports\Exports\ProductionReportExport;
use Maatwebsite\Excel\Facades\Excel;

class SendOomaProductionReportCommand extends BaseProductionReportCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ooma:send-production-report {--date=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a roduction report to Ooma distro, including a daily, wtd and mtd data, along with the daily dispositions';


    public function handle()
    {
        $dates_range = $this->getDatesRange();
        $client_name = 'Ooma';
        $file_name = $this->getFileName($client_name, $dates_range);

        $report = new ProductionReportExport(
            $sheets = [
                \App\Console\Commands\RingCentralReports\Exports\Sheets\Ooma\OomaDailyProductionSheet::class,
                \App\Console\Commands\RingCentralReports\Exports\Sheets\Ooma\OomaWeekTDProductionSheet::class,
                \App\Console\Commands\RingCentralReports\Exports\Sheets\Ooma\OomaMonthTDProductionSheet::class,
                \App\Console\Commands\RingCentralReports\Exports\Sheets\DispositionsSheet::class,
            ],
            $client_name,
            $campaign_name = 'INT - OOM - OOM_Out',
            $dates_range,
            $distro_array = $this->getDistroList('dainsys.ooma.distro'),
            $team = 'ECC%'
        );

        Excel::store($report, $file_name);

        $report->send($file_name);

        $this->info("{$client_name} Production Report Sent!");
    }

    /**
     * Replace default method
     *
     * @return array
     */
    protected function getDatesRange(): array
    {
        $date = now();

        $to_date = $this->option('date') ?
            $date->copy()->parse($this->option('date')) : // parse given date
            $date->copy(); // use today's date

        $from_date = $to_date;

        return [
            'from_date' => $from_date->format('Y-m-d'),
            'to_date' => $to_date->format('Y-m-d')
        ];
    }
}
