<?php

namespace App\Console\Commands\RingCentralReports\Exports\Sheets;

use Illuminate\Support\Str;
use Maatwebsite\Excel\Sheet;
use App\Exports\RangeFormarter;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Maatwebsite\Excel\Events\AfterSheet;
use App\Console\Commands\RingCentralReports\Exports\Support\Connections\ConnectionContract;
use App\Console\Commands\RingCentralReports\Exports\Support\Connections\RingCentralConnection;

class ProductionSheet extends BaseRingCentralSheet
{
    public function getData(ConnectionContract $connection, string $date_from, string $date_to): array
    {
        return $connection->connect()
            ->select(
                DB::raw("
                    declare @fromDate as smalldatetime, @toDate as smalldatetime, @campaign as varchar(50), @team as varchar(50) = '%'
                    set @fromDate = '{$date_from}'
                    set @toDate = '{$date_to}'
                    set @campaign = '{$this->exporter->campaign_name}'
                    set @team = '{$this->exporter->team}'
                    
                    exec [sp_Hours_Summary] @fromDate, @toDate, @campaign, @team
                ")
            );
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

            $cache_key = $this->exporter->campaign_name . $this->exporter->team . $this->exporter->dates_range['from_date'] . $this->exporter->dates_range['to_date'] . collect($this->data)->sum('login_time');

            if (!Cache::has($cache_key)) {
                Cache::forever($cache_key, 'any');

                $this->exporter->data_is_new = true;
            }
        }

        return view(
            "exports.reports.ring_central.{$class_name}",
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
        return "{$this->exporter->client_name} Production Report";
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
                $last_column = 'P';

                $this->addSubTotals($totals_row, $rows, $event->sheet);

                $formarter = new RangeFormarter($event, "A1:{$last_column}{$rows}");

                $formarter->configurePage()
                    ->setAutoSizeRange('B', 'E')
                    ->formatTitle('A1:D1')
                    ->freezePane('A3')
                    ->setAutoFilter("A2:{$last_column}{$rows}")
                    ->formatHeaderRow("A2:{$last_column}2")
                    ->setColumnsRangeWidth('A', 'A', 10)
                    ->applyBorders("A3:{$last_column}{$rows}")
                    ->applyNumberFormats("F3:H{$totals_row}")
                    ->applyNumberFormats("I3:K{$totals_row}", '_(* #,##0_);_(* (#,##0);_(* "-"??_);_(@_)')
                    ->applyNumberFormats("L3:L{$totals_row}")
                    ->applyNumberFormats("M3:{$last_column}{$totals_row}", '_(* #,##0.0%_);_(* (#,##0.0%);_(* "-"??_);_(@_)')
                    ->formatTotals("F{$totals_row}:P{$totals_row}");
            },
        ];
    }

    public function addSubTotals(int $totals_row, int $rows, Sheet $sheet_object)
    {
        $loginTimeColumn = 'F';
        $workTimeColumn = 'G';
        $talkTimeColumn = 'H';
        $callsColumn = 'I';
        $salesColumn = 'J';
        $contactsColumn = 'K';

        foreach (range($loginTimeColumn, $contactsColumn) as $letter) {
            $sheet_object->setCellValue(
                "{$letter}{$totals_row}",
                "=SUBTOTAL(9, {$letter}3:{$letter}{$rows})"
            );
        }

        // SPH Rate
        $sheet_object->setCellValue(
            "L{$totals_row}",
            "=IFERROR({$salesColumn}{$totals_row}/{$workTimeColumn}{$totals_row},0)"
        );

        // Conversion Rate
        $sheet_object->setCellValue(
            "M{$totals_row}",
            "=IFERROR({$salesColumn}{$totals_row}/{$contactsColumn}{$totals_row},0)"
        );

        // Contact Rate
        $sheet_object->setCellValue(
            "N{$totals_row}",
            "=IFERROR({$contactsColumn}{$totals_row}/{$callsColumn}{$totals_row},0)"
        );

        // Hours Efficiency Rate
        $sheet_object->setCellValue(
            "O{$totals_row}",
            "=IFERROR({$workTimeColumn}{$totals_row}/{$loginTimeColumn}{$totals_row},0)"
        );

        // Talk Time Rate
        $sheet_object->setCellValue(
            "P{$totals_row}",
            "=IFERROR({$talkTimeColumn}{$totals_row}/{$workTimeColumn}{$totals_row},0)"
        );
    }
}
