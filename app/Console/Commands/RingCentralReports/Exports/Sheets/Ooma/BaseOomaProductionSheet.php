<?php

namespace App\Console\Commands\RingCentralReports\Exports\Sheets\Ooma;

use App\Console\Commands\RingCentralReports\Exports\Sheets\BaseRingCentralSheet;
use App\Console\Commands\RingCentralReports\Exports\Sheets\Traits\OomaRingCentralTrait;
use App\Console\Commands\RingCentralReports\Exports\Support\Connections\ConnectionContract;
use App\Console\Commands\RingCentralReports\Exports\Support\Connections\RingCentralConnection;
use App\Exports\RangeFormarter;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Sheet;

abstract class BaseOomaProductionSheet extends BaseRingCentralSheet
{
    use OomaRingCentralTrait;

    public function getData(ConnectionContract $connection, string $date_from, string $date_to): array
    {
        return $connection->connect()
            ->select(
                "
                    SELECT
                        [Dial Group] as dial_group
                        , trim([First Name]) AS agent_fname
                        , trim([Last Name]) AS agent_lname
                        , trim([First Name] + ' ' + [Last Name]) AS agent_name
                        , Username as username
                        , MIN(CONVERT(date, [Login DTS])) AS date_from
                        , MAX(CONVERT(date, [Login DTS])) AS date_to
                        , SUM(CONVERT(float, REPLACE([Login Time (min)], ',', ''))) / 60 AS login_time
                        , SUM(CONVERT(float, REPLACE([Work Time (min)], ',', ''))) / 60 AS work_time
                        , SUM(CONVERT(float, REPLACE([Talk Time (min)], ',', ''))) / 60 AS talk_time
                        , SUM(CONVERT(float, REPLACE([Pending Disp Time (min)], ',', ''))) / 60 AS pending_dispo_time
                        , Team as team
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
                        , Username
                    ORDER BY
                        [Dial Group]
                        , Team
                        , [First Name]
                , [Last Name]
                "
            );
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event): void {
                $rows = count($this->data) + 2;
                $totals_row = $rows + 1;
                $sheet = $event->sheet->getDelegate();
                $last_column = 'L';

                $this->addSubTotals($totals_row, $rows, $event->sheet);

                $formarter = new RangeFormarter($event, "A1:{$last_column}{$rows}");

                $formarter->configurePage()
                    ->formatTitle('A1:D1')
                    ->formatHeaderRow("A2:{$last_column}2")
                    ->setRowHeight(2, 45)
                    ->freezePane('A3')
                    ->setAutoFilter("A2:{$last_column}{$rows}")
                    ->setColumnsRangeWidth('A', 'A', 19)
                    ->applyBorders("A3:{$last_column}{$rows}")
                    ->setAutoSizeRange('B', 'E')
                    ->setColumnsRangeWidth('F', $last_column, 11)
                    ->applyNumberFormats("F3:H{$totals_row}")
                    ->applyNumberFormats("I3:I{$totals_row}", '_(* #,##0.0%_);_(* (#,##0.0%);_(* "-"??_);_(@_)')
                    ->applyNumberFormats("J3:{$last_column}{$totals_row}", '_(* #,##0_);_(* (#,##0);_(* "-"??_);_(@_)')
                    ->formatTotals("F{$totals_row}:{$last_column}{$totals_row}");
            },
        ];
    }

    public function addSubTotals(int $totals_row, int $rows, Sheet $sheet_object)
    {
        $loginTimeColumn = 'F';
        $workTimeColumn = 'G';
        $talkTimeColumn = 'H';
        $callsColumn = 'J';

        foreach (range($loginTimeColumn, $talkTimeColumn) as $letter) {
            $sheet_object->setCellValue(
                "{$letter}{$totals_row}",
                "=SUBTOTAL(9, {$letter}3:{$letter}{$rows})"
            );
        }

        // Talk Time Rate
        $sheet_object->setCellValue(
            "I{$totals_row}",
            "=IFERROR({$talkTimeColumn}{$totals_row}/{$workTimeColumn}{$totals_row},0)"
        );

        foreach (range($callsColumn, 'L') as $letter) {
            $sheet_object->setCellValue(
                "{$letter}{$totals_row}",
                "=SUBTOTAL(9, {$letter}3:{$letter}{$rows})"
            );
        }
    }

    public function title(): string
    {
        return $this->page_title ?? Str::of(class_basename($this))
            ->kebab()
            ->replace('-', ' ')
            ->words(2, '')
            ->title();
    }

    protected function parseView(string $date_from, string $date_to): View
    {
        $this->data = $this->getData(new RingCentralConnection, $date_from, $date_to);
        $dispositions = $this->getDispositionsSummary(
            new RingCentralConnection,
            $date_from,
            $date_to,
        );

        if (count($this->data) > 0 && $this->reportable === true) {
            $this->exporter->has_data = true;
        }

        return view(
            'exports.reports.ring_central.ooma_production_sheet',
            [
                'title' => "Ooma {$this->title()} Production Report From {$date_from} To {$date_to}",
                'data' => $this->data,
                'dispositions' => collect($dispositions),
            ]
        );
    }
}
