<?php

namespace App\Console\Commands\RingCentralReports\Commands\Ooma;

use Maatwebsite\Excel\Facades\Excel;
use App\Console\Commands\RingCentralReports\Exports\ProductionReportExport;
use App\Console\Commands\RingCentralReports\Commands\BaseProductionReportCommand;

class SendOomaMTDCallsReportCommand extends BaseProductionReportCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ooma:send-mtd-calls-report {--date=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a roduction report to Ooma Internal distro with all calls MTD for OOMA';

    public function handle()
    {
        $dates_range = $this->getDatesRange();
        $client_name = 'Ooma';
        $file_name = $this->getFileName($client_name, $dates_range);

        $report = new ProductionReportExport(
            $sheets = [
                \App\Console\Commands\RingCentralReports\Exports\Sheets\Ooma\OomaMonthTDCallsSheet::class,
            ],
            $client_name,
            $campaign_name = 'INT - OOM - OOM_Out',
            $dates_range,
            $distro_array = $this->getDistroList($this->name),
            $team = 'ECC%',
            $subject_sufix = 'MTD Calls Report'
        );

        Excel::store($report, $file_name);

        $report->send($file_name);

        $this->info("{$client_name} MTD Calls Report Report Sent!");
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

        $from_date = $to_date->copy()->startOfMonth(); // use start of month

        return [
            'from_date' => $from_date->format('Y-m-d'),
            'to_date' => $to_date->format('Y-m-d'),
        ];
    }
}
