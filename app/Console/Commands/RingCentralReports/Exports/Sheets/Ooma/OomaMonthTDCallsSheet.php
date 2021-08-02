<?php

namespace App\Console\Commands\RingCentralReports\Exports\Sheets\Ooma;

use App\Console\Commands\RingCentralReports\Exports\Sheets\DispositionsSheet;
use App\Console\Commands\RingCentralReports\Exports\Support\Connections\ConnectionContract;
use App\Console\Commands\RingCentralReports\Exports\Support\Connections\RingCentralConnection;
use App\Exports\RangeFormarter;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Sheet;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;

class OomaMonthTDCallsSheet extends DispositionsSheet
{
    /**
     * Report this sheet if it has data. For some sheets it make no sense to send a report
     * if they are the only one with data.
     *
     * @var boolean
     */
    protected $reportable = true;
    /**
     * @return View
     */
    public function view(): View
    {
        // $class_name = Str::snake(class_basename($this));

        $this->data = $this->getData(new RingCentralConnection(), $this->exporter->dates_range['from_date'], $this->exporter->dates_range['to_date']);

        if (count($this->data) > 0 && $this->reportable == true) {
            $this->exporter->has_data = true;
        }

        return view(
            "exports.reports.ring_central.calls_mtd",
            [
                // 'title' => "{$this->exporter->client_name} {$this->title()} From {$this->exporter->dates_range['from_date']} To {$this->exporter->dates_range['to_date']}",
                'data' => $this->data,
            ]
        );
    }

    public function getData(ConnectionContract $connection, string $date_from, string $date_to): array
    {
        return $connection->connect()
            ->select(
                DB::raw(" 
                    SELECT 
                        CONVERT(DATE, call_start) as call_date
                        , CONVERT(TIME, call_start) AS call_time
                        , lead_phone
                        , TRIM(agent_first_name) + ' ' + TRIM(agent_last_name) AS agent_name 
                        , UPPER(TRIM(title)) AS title
                        , first_name
                        , mid_name
                        , last_name
                        , suffix
                        , address1
                        , address2
                        , city
                        , state
                        , zip
                        , aux_data2
                        , agent_disposition
                        , agent_notes as notes
                        , recording_url
                        , dial_group_name
                    FROM DIALER_RESULT_DOWNLOAD
                    WHERE 
                        CONVERT(DATE, call_start) BETWEEN '{$date_from}' and '{$date_to}'
                        AND agent_disposition NOT LIKE ''
                        AND dial_group_name LIKE '{$this->exporter->campaign_name}'
                    ORDER BY call_start DESC
                ")
            );
    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $rows = count($this->data) + 2;
                $last_column = 'S';


                $formarter = new RangeFormarter($event, "A1:{$last_column}{$rows}");

                $formarter->configurePage(PageSetup::ORIENTATION_PORTRAIT)
                    ->setColumnsRangeWidth("A", "B", 11)
                    ->setColumnsRangeWidth("C", $last_column, 13)
                    ->setAutoFilter("A1:{$last_column}{$rows}")
                    ->formatHeaderRow("A1:{$last_column}1")
                    ->freezePane('A2');
            }
        ];
    }
}
