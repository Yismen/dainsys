<?php

namespace App\Console\Commands\Inbound\Sheets;

use App\Exports\RangeFormarter;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithPreCalculateFormulas;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class ByEmployee implements FromView, WithTitle, WithEvents, WithPreCalculateFormulas
{
    protected $data;

    protected $sheet;

    protected $rows;
    protected $last_column;

    protected $sheetName;

    protected $title_line;

    protected String $view;

    public function __construct(array $data)
    {
        $this->data = $data;
        $this->rows = count($this->data) + 2;
        $this->last_column = "L";
        $this->sheetName = Str::of(\class_basename($this))->snake()->replace('_', ' ')->title();
        $this->title_line = "Inbound {$this->sheetName} Report";
        $this->view = 'exports.inbound.' . Str::of(\class_basename($this))->snake();
    }

    public function view(): View
    {
        return view($this->view, [
            'data' => $this->data,
            'dataTitle' => $this->title_line,
        ]);
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $totalsRow = $this->rows + 1;

                // auto
                $this->sheet = $event->sheet->getDelegate();

                $this->addSubTotals();

                (new RangeFormarter($event, "A1:{$this->last_column}{$this->rows}"))
                    ->configurePage()
                    ->setColumnsWidth("B", "D")
                    ->formatTitle("A1:D1")
                    ->formatHeaderRow("A2:{$this->last_column}2", 2, 45)
                    ->applyBorders("A3:{$this->last_column}{$this->rows}")
                    ->applyNumberFormats("E3:J{$totalsRow}", '#,##0.00')
                    ->applyNumberFormats("K3:L{$totalsRow}", '#,##0')
                    ->formatTotals("E{$totalsRow}:L{$totalsRow}");

                $this->sheet->freezePane('E3');

                $this->sheet->setAutoFilter("A2:{$this->last_column}{$this->rows}");
            }
        ];
    }

    public function title(): string
    {
        return $this->sheetName;
    }

    protected function addSubTotals()
    {
        $totalsRow = ($this->rows + 1);
        $totalCallsColumn = 'K';

        // Sum
        foreach (range('K', "L") as $letter) {
            $this->sheet->setCellValue(
                "{$letter}{$totalsRow}",
                "=SUBTOTAL(9, {$letter}3:{$letter}{$this->rows})"
            );
        }

        // Average
        foreach (range('E', "J") as $letter) {
            $this->sheet->setCellValue(
                "{$letter}{$totalsRow}",
                "=SUMPRODUCT(SUBTOTAL(9,OFFSET({$totalCallsColumn}3:{$totalCallsColumn}{$this->rows},ROW({$letter}3:{$letter}{$this->rows})-MIN(ROW({$letter}3:{$letter}{$this->rows})),,1)),{$letter}3:{$letter}{$this->rows})/SUBTOTAL(9,{$totalCallsColumn}3:{$totalCallsColumn}{$this->rows})" // https://www.excelforum.com/excel-general/827851-subtotal-and-weighted-average.html
                // "=SUBTOTAL(9, {$letter}3:{$letter}{$this->rows})/{$totalCallsColumn}{$totalsRow}"
            );
        }
    }
}
