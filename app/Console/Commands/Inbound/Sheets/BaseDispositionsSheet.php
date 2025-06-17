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

abstract class BaseDispositionsSheet implements FromView, WithTitle, WithEvents, WithPreCalculateFormulas
{
    protected $data;

    protected $sheet;

    protected $rows;
    protected $last_column;

    protected $auto_fit_column_start;
    protected $auto_fit_column_end;
    protected $freeze_pane_cell;
    protected $total_calls_column;
    protected $total_sales_column;
    protected $avg_column_start;
    protected $avg_column_end;

    protected $sheetName;

    protected $title_line;

    protected $view;

    protected $sheet_name;

    public function __construct(array $data, $sheet_name = null, protected $date_from = null, protected $date_to = null)
    {
        $this->data = $data;

        $this->rows = count($this->data) + 2;
        $this->sheetName = $sheet_name ?: Str::of(\class_basename($this))->snake()->replace('_', ' ')->title();
        $this->title_line = "Inbound {$this->sheetName} Report" . ($this->date_from && $this->date_to ? ", from {$this->date_from} to {$this->date_to}" : '');
        $this->view = $this->view ?: 'exports.inbound.' . Str::of(\class_basename($this))->snake();
        $this->sheet_name = $sheet_name;
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
            AfterSheet::class => function (AfterSheet $event): void {
                $totalsRow = $this->rows + 1;

                // auto
                $this->sheet = $event->sheet->getDelegate();

                $this->addSubTotals();

                (new RangeFormarter($event, "A1:{$this->last_column}{$this->rows}"))
                    ->configurePage()
                    ->setColumnsWidth($this->auto_fit_column_start, $this->auto_fit_column_end)
                    ->formatTitle('A1:D1')
                    ->formatHeaderRow("A2:{$this->last_column}2")
                    ->setRowHeight(2, 45)
                    ->applyBorders("A3:{$this->last_column}{$this->rows}")
                    ->applyNumberFormats("{$this->avg_column_start}3:{$this->avg_column_end}{$totalsRow}", '_(* #,##0.00_);_(* (#,##0.00);_(* "-"??_);_(@_)')
                    ->applyNumberFormats("{$this->total_calls_column}3:{$this->total_sales_column}{$totalsRow}", '_(* #,##0_);_(* (#,##0);_(* "-"??_);_(@_)')
                    ->applyNumberFormats("{$this->last_column}3:{$this->last_column}{$totalsRow}", '_(* #,##0.00%_);_(* (#,##0.00%);_(* "-"??_);_(@_)')
                    ->formatTotals("{$this->avg_column_start}{$totalsRow}:{$this->last_column}{$totalsRow}");

                $this->sheet->freezePane($this->freeze_pane_cell);

                $this->sheet->setAutoFilter("A2:{$this->last_column}{$this->rows}");
            },
        ];
    }

    public function title(): string
    {
        return $this->sheetName;
    }

    protected function addSubTotals()
    {
        $totalsRow = $this->rows + 1;
        $totalCallsColumn = $this->total_calls_column;

        // Sum
        foreach (range($this->total_calls_column, $this->total_sales_column) as $letter) {
            $this->sheet->setCellValue(
                "{$letter}{$totalsRow}",
                "=SUBTOTAL(9, {$letter}3:{$letter}{$this->rows})"
            );
        }

        // Average
        foreach (range($this->avg_column_start, $this->avg_column_end) as $letter) {
            $this->sheet->setCellValue(
                "{$letter}{$totalsRow}",
                "=SUMPRODUCT(SUBTOTAL(9,OFFSET({$totalCallsColumn}3:{$totalCallsColumn}{$this->rows},ROW({$letter}3:{$letter}{$this->rows})-MIN(ROW({$letter}3:{$letter}{$this->rows})),,1)),{$letter}3:{$letter}{$this->rows})/SUBTOTAL(9,{$totalCallsColumn}3:{$totalCallsColumn}{$this->rows})" // https://www.excelforum.com/excel-general/827851-subtotal-and-weighted-average.html
                // "=SUBTOTAL(9, {$letter}3:{$letter}{$this->rows})/{$totalCallsColumn}{$totalsRow}"
            );
        }

        $this->sheet->setCellValue(
            "{$this->last_column}{$totalsRow}",
            "={$this->total_sales_column}{$totalsRow}/{$this->total_calls_column}{$totalsRow}"
        );
    }
}
