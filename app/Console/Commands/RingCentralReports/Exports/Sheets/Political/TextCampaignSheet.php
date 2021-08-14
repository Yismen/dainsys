<?php

namespace App\Console\Commands\RingCentralReports\Exports\Sheets\Political;

use App\Console\Commands\RingCentralReports\Exports\Sheets\BaseRingCentralSheet;
use App\Console\Commands\RingCentralReports\Exports\Support\Connections\ConnectionContract;
use App\Console\Commands\RingCentralReports\Exports\Support\Connections\RingCentralConnection;
use App\Exports\RangeFormarter;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Sheet;

class TextCampaignSheet extends BaseRingCentralSheet
{
    public function getData(ConnectionContract $connection, string $date_from, string $date_to): array
    {
        $data = $connection->connect()
            ->select(
                DB::raw("
                    SELECT        
                        [Dial Group] as dial_group 
                        , CONVERT(date, [Login DTS]) AS production_date
						, Team as team
                        , trim([First Name] + ' ' + [Last Name]) AS agent_name
                        , SUM(CONVERT(float, REPLACE([Login Time (min)], ',', ''))) / 60 AS login_time
                    FROM   dbo.Agent_Session_Report_Raw
                    WHERE
                        CONVERT(date, [Login DTS]) BETWEEN '{$date_from}' AND '{$date_to}'
                        AND [Dial Group] LIKE '{$this->exporter->campaign_name}'
                        AND Team like '{$this->exporter->team}'
                    GROUP BY 
                        [Dial Group]
                        , Team
                        , [First Name]
                        , [Last Name]
						, CONVERT(date, [Login DTS])
                    ORDER BY
                        [Dial Group]
						, CONVERT(date, [Login DTS])
                        , Team
                        , [First Name]
						, [Last Name]
                ")
            );

        return $data;
    }
    /**
     * @return View
     */
    public function view(): View
    {
        $class_name = Str::snake(class_basename($this));

        $this->data = $this->getData(new RingCentralConnection(), $this->exporter->dates_range['from_date'], $this->exporter->dates_range['to_date']);

        if (count($this->data) > 0) {
            $this->exporter->has_data = true;
        }

        return view(
            "exports.reports.ring_central.political.{$class_name}",
            [
                'title' => "{$this->title()} From {$this->exporter->dates_range['from_date']} To {$this->exporter->dates_range['to_date']}",
                'data' => $this->data,
            ]
        );
    }
    /**
     * @return string
     */
    public function title(): string
    {
        return "{$this->exporter->client_name} Hours";
    }
    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $rows = count($this->data) + 2;
                $totals_row = $rows + 1;
                $sheet = $event->sheet->getDelegate();
                $last_column = 'E';

                $this->addSubTotals($totals_row, $rows, $event->sheet);


                $formarter = new RangeFormarter($event, "A1:{$last_column}{$rows}");

                $formarter->configurePage()
                    ->formatTitle("A1:D1")
                    ->setAutoSizeRange("B", "E")
                    ->freezePane('A3')
                    ->setAutoFilter("A2:{$last_column}{$rows}")
                    ->formatHeaderRow("A2:{$last_column}2")
                    ->setColumnsRangeWidth('A', 'A', 20)
                    ->applyBorders("A3:{$last_column}{$rows}")
                    ->applyNumberFormats("E3:E{$totals_row}", '_(* #,##0.00_);_(* (#,##0.00);_(* "-"??_);_(@_)')
                    ->formatTotals("E{$totals_row}:E{$totals_row}");
            }
        ];
    }

    public function addSubTotals(int $totals_row, int $rows, Sheet $sheet_object)
    {
        $loginTimeColumn = 'E';

        $sheet_object->setCellValue(
            "{$loginTimeColumn}{$totals_row}",
            "=SUBTOTAL(9, {$loginTimeColumn}3:{$loginTimeColumn}{$rows})"
        );
    }
}
