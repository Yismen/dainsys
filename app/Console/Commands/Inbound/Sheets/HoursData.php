<?php

namespace App\Console\Commands\Inbound\Sheets;

use App\Exports\RangeFormarter;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithPreCalculateFormulas;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Illuminate\Support\Str;

class HoursData implements FromView, WithTitle, WithEvents, WithPreCalculateFormulas
{
    protected $data;

    protected $sheet;

    protected $rows;
    protected $last_column;

    protected $sheetName;

    protected $title;

    protected String $view;

    public function __construct(array $data)
    {
        $this->data = $data;

        $this->rows = count($this->data) + 2;
        $this->last_column = "D";
        $this->sheetName = Str::of(\class_basename($this))->snake()->replace('_', ' ')->title();
        $this->title = "Inbound {$this->sheetName} Report";
        $this->view = 'exports.inbound.' . Str::of(\class_basename($this))->snake();
    }

    public function view(): View
    {
        return view($this->view, [
            'data' => $this->data,
            'dataTitle' => $this->title,
        ]);
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $totalsRow = $this->rows + 1;

                // auto
                $this->sheet = $event->sheet->getDelegate();


                (new RangeFormarter($event, "A1:{$this->last_column}{$this->rows}"))
                    ->configurePage()
                    ->setColumnsWidth("B", "C")
                    ->formatTitle("A1:D1")
                    ->formatHeaderRow("A2:{$this->last_column}2")
                    ->applyBorders("A3:{$this->last_column}{$this->rows}")
                    ->applyNumberFormats("D3:D{$totalsRow}", '#,##0.00')
                    ->formatTotals("D{$totalsRow}:D{$totalsRow}");

                $this->addSubTotals();

                $this->sheet->freezePane('G3');

                $this->sheet->setAutoFilter("A2:{$this->last_column}{$this->rows}");

                // Adjust DialGroup column width
                $this->sheet->getColumnDimension('A')->setWidth(10);
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
        $loginTimeColumn = 'D';

        foreach (range($loginTimeColumn, $loginTimeColumn) as $letter) {
            $this->sheet->setCellValue(
                "{$letter}{$totalsRow}",
                "=SUBTOTAL(9, {$letter}3:{$letter}{$this->rows})"
            );
        }
    }
}
