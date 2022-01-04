<?php

namespace App\Console\Commands\RingCentralReports\Exports\Sheets\Ooma;

use App\Console\Commands\RingCentralReports\Exports\Sheets\DispositionsSheet;
use App\Console\Commands\RingCentralReports\Exports\Support\Connections\RingCentralConnection;
use App\Exports\RangeFormarter;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Sheet;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;

class OomaDispositionsSheet extends DispositionsSheet
{
    protected $program_start_date = '2021-07-07';
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
        $class_name = Str::snake(class_basename($this));

        $period_td = $this->getData(new RingCentralConnection(), $this->program_start_date, $this->exporter->dates_range['to_date']);
        $this->data = $this->getData(new RingCentralConnection(), $this->exporter->dates_range['from_date'], $this->exporter->dates_range['to_date']);

        if (count($this->data) > 0 && $this->reportable == true) {
            $this->exporter->has_data = true;
        }

        return view(
            "exports.reports.ring_central.{$class_name}",
            [
                'title' => "{$this->exporter->client_name} {$this->title()} From {$this->exporter->dates_range['from_date']} To {$this->exporter->dates_range['to_date']}",
                'data' => $this->data,
                'period_td' => collect($period_td),
            ]
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
                $last_column = 'H';

                $this->addSubTotals($totals_row, $rows, $event->sheet);

                $formarter = new RangeFormarter($event, "A1:{$last_column}{$rows}");

                $formarter->configurePage(PageSetup::ORIENTATION_PORTRAIT)
                    ->setAutoSizeRange('B', 'D')
                    ->setColumnsRangeWidth('A', 'A', 19)
                    ->setColumnsRangeWidth('B', $last_column, 11)
                    ->formatTitle('A1:D1')
                    ->freezePane('A3')
                    ->setAutoFilter("A2:{$last_column}{$rows}")
                    ->formatHeaderRow("A2:{$last_column}2")
                    ->applyBorders("A3:{$last_column}{$rows}")
                    ->applyNumberFormats("E3:F{$totals_row}", '_(* #,##0_);_(* (#,##0);_(* "-"??_);_(@_)')
                    ->applyNumberFormats("G3:{$last_column}{$totals_row}", '_(* #,##0.0%_);_(* (#,##0.0%);_(* "-"??_);_(@_)')
                    ->formatTotals("E{$totals_row}:F{$totals_row}");
            },
        ];
    }

    public function addSubTotals(int $totals_row, int $rows, Sheet $sheet_object)
    {
        foreach (range('E', 'F') as $letter) {
            $sheet_object->setCellValue(
                "{$letter}{$totals_row}",
                "=SUBTOTAL(9, {$letter}3:{$letter}{$rows})"
            );
        }

        // $sheet_object->setCellValue(
        //     "J{$totals_row}",
        //     // "=SUBTOTAL(9, {$letter}3:{$letter}{$rows})"
        //     "=J{$totals_row}/E{$rows}"
        // );

        // $sheet_object->setCellValue(
        //     "K{$totals_row}",
        //     // "=SUBTOTAL(9, {$letter}3:{$letter}{$rows})"
        //     "=K{$totals_row}/F{$rows}"
        // );
    }
}
