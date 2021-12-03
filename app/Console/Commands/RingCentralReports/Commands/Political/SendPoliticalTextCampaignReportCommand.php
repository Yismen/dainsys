<?php

namespace App\Console\Commands\RingCentralReports\Commands\Political;

use App\Console\Commands\RingCentralReports\Commands\BaseProductionReportCommand;
use App\Console\Commands\RingCentralReports\Exports\ProductionReportExport;
use Maatwebsite\Excel\Facades\Excel;

class SendPoliticalTextCampaignReportCommand extends BaseProductionReportCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'political:send-text-campaign-report {--date=} {--from_date=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a roduction report for the text campaign to Political distro';

    public function handle()
    {
        $dates_range = $this->getDatesRange();
        $client_name = 'Political Text Campaign';
        $file_name = $this->getFileName($client_name, $dates_range);

        $report = new ProductionReportExport(
            $sheets = [
                \App\Console\Commands\RingCentralReports\Exports\Sheets\Political\TextCampaignSheet::class,
            ],
            $client_name,
            $campaign_name = 'POL - Text%',
            $dates_range,
            $distro_array = $this->getDistroList('dainsys.political.text_distro'),
            $team = '%',
            $subject_sufix = 'Daily Production Report'
        );

        Excel::store($report, $file_name);

        $report->send($file_name);

        $this->info("{$client_name} Text Report Sent!");
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

        $ranges = [
            'from_date' => $from_date->format('Y-m-d'),
            'to_date' => $to_date->format('Y-m-d'),
        ];

        return $ranges;
    }
}
