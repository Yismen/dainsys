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

class HoursData implements FromView, WithEvents, WithPreCalculateFormulas, WithTitle
{
    protected $data;

    protected $sheet;

    protected $rows;

    protected $last_column;

    protected $sheetName;

    protected $title;

    protected string $view;

    public function __construct(array $data)
    {
        $this->data = $data;

        $this->rows = count($this->data) + 2;
        $this->last_column = 'E';
        $this->sheetName = Str::of(\class_basename($this))->snake()->replace('_', ' ')->title();
        $this->title = "Inbound {$this->sheetName} Report";
        $this->view = 'exports.inbound.'.Str::of(\class_basename($this))->snake();
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
            AfterSheet::class => function (AfterSheet $event): void {
                $totalsRow = $this->rows + 1;

                // auto
                $this->sheet = $event->sheet->getDelegate();

                (new RangeFormarter($event, "A1:{$this->last_column}{$this->rows}"))
                    ->configurePage()
                    ->setColumnsWidth('B', 'D')
                    ->formatTitle('A1:E1')
                    ->formatHeaderRow("A2:{$this->last_column}2")
                    ->applyBorders("A3:{$this->last_column}{$this->rows}")
                    ->applyNumberFormats("E3:E{$totalsRow}", '#,##0.00')
                    ->formatTotals("E{$totalsRow}:E{$totalsRow}");

                $this->addSubTotals();

                $this->sheet->freezePane('A3');

                $this->sheet->setAutoFilter("A2:{$this->last_column}{$this->rows}");

                // Adjust DialGroup column width
                $this->sheet->getColumnDimension('A')->setWidth(10);
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
        $loginTimeColumn = 'E';

        foreach (range($loginTimeColumn, $loginTimeColumn) as $letter) {
            $this->sheet->setCellValue(
                "{$letter}{$totalsRow}",
                "=SUBTOTAL(9, {$letter}3:{$letter}{$this->rows})"
            );
        }
    }
}
