<?php

namespace App\Console\Commands\RingCentralReports\Exports\Sheets;

use App\Console\Commands\RingCentralReports\Exports\Support\Connections\ConnectionContract;
use App\Console\Commands\RingCentralReports\Exports\Support\Connections\RingCentralConnection;
use App\Exports\RangeFormarter;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Sheet;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;

class DispositionsSheet extends BaseRingCentralSheet
{
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
        return "Dispositions";
    }

    public function getData(ConnectionContract $connection, string $date_from, string $date_to): array
    {
        return $connection->connect()
            ->select(
                DB::raw(" 
                    declare @fromDate as smalldatetime, @toDate as smalldatetime, @campaign as varchar(50), @team as varchar(50)
                    set @fromDate = '{$date_from}'
                    set @toDate = '{$date_to}'
                    set @campaign = '{$this->exporter->campaign_name}'
                    set @team = '{$this->exporter->team}'
                    
                    exec [sp_Dispositions_Summary] @fromDate, @toDate, @campaign, @team
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
                $totals_row = $rows + 1;
                $sheet = $event->sheet->getDelegate();
                $last_column = 'F';

                $this->addSubTotals($totals_row, $rows, $event->sheet);


                $formarter = new RangeFormarter($event, "A1:{$last_column}{$rows}");

                $formarter->configurePage(PageSetup::ORIENTATION_PORTRAIT)
                    ->setAutoSizeRange("B", "F")
                    ->formatTitle("A1:D1")
                    ->freezePane('A3')
                    ->setAutoFilter("A2:{$last_column}{$rows}")
                    ->formatHeaderRow("A2:{$last_column}2")
                    ->applyBorders("A3:{$last_column}{$rows}")
                    ->applyNumberFormats("E3:E{$totals_row}", '_(* #,##0_);_(* (#,##0);_(* "-"??_);_(@_)')
                    ->applyNumberFormats("F3:{$last_column}{$totals_row}", '_(* #,##0.0%_);_(* (#,##0.0%);_(* "-"??_);_(@_)')
                    ->formatTotals("E{$totals_row}:F{$totals_row}");
            }
        ];
    }

    public function addSubTotals(int $totals_row, int $rows, Sheet $sheet_object)
    {
        foreach (range('E', 'E') as $letter) {
            $sheet_object->setCellValue(
                "{$letter}{$totals_row}",
                "=SUBTOTAL(9, {$letter}3:{$letter}{$rows})"
            );
        }
    }
}
