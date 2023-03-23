<?php

namespace App\Console\Commands\RingCentralReports\Commands\HotelPlanning;

use Maatwebsite\Excel\Facades\Excel;
use App\Console\Commands\RingCentralReports\Exports\ProductionReportExport;
use App\Console\Commands\RingCentralReports\Commands\BaseProductionReportCommand;

class SendHotelPlanningProductionReportCommand extends BaseProductionReportCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hpc:send-production-report {--date=} {--from_date=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a roduction report for the text campaign to Hotel Planning distro';

    public function handle()
    {
        $dates_range = $this->getDatesRange();
        $client_name = 'Hotel Planning';
        $file_name = $this->getFileName($client_name, $dates_range);

        $report = new ProductionReportExport(
            $sheets = [
                \App\Console\Commands\RingCentralReports\Exports\Sheets\HotelPlanning\ProductionSheet::class,
            ],
            $client_name,
            $campaign_name = 'HPC%',
            $dates_range,
            $distro_array = $this->getDistroList($this->name),
            $team = '%',
            $subject_sufix = 'Hourly Production Report'
        );

        Excel::store($report, $file_name);

        $report->send($file_name);

        $this->info("{$client_name} Production Report Sent!");
    }

    /**
     * Returns the dates range form the report
     *
     * @return array
     */
    protected function getDatesRange(): array
    {
        $date = now();

        $to_date = $this->option('date') ?
            $date->copy()->parse($this->option('date')) : // parse given date
            $date->copy()->subDay(); // use today's date

        $from_date = $this->option('from_date') ?
            $date->copy()->parse($this->option('from_date')) : // parse given date
            $to_date->copy(); // use date option

        return [
            'from_date' => $from_date->format('Y-m-d'),
            'to_date' => $to_date->format('Y-m-d'),
        ];
    }
}
