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

class WTDHoursData implements FromView, WithTitle, WithEvents, WithPreCalculateFormulas
{
    protected $data;
    protected $names;
    protected $dates;

    protected $sheet;

    protected $rows;
    protected $last_column;

    protected $sheetName;

    protected $title;


    protected String $view;

    public function __construct(array $data)
    {
        $this->data = collect($data);
        $this->dates = $this->data->pluck('Report Date')->unique()->sort();
        $this->names = $this->data->pluck('agent_name')->unique()->sort();
        $this->rows = count($this->names) + 2;
        $this->last_column = range("A", "K")[$this->dates->count() + 1];
        $this->sheetName = Str::of(\class_basename($this))->snake()->replace('_', ' ')->title();
        $this->title = "Inbound {$this->sheetName} Report";
        $this->view = 'exports.inbound.wtd.hours';
    }

    public function view(): View
    {

        return view($this->view, [
            'data' => $this->data,
            'dates' => $this->dates,
            'names' => $this->names,
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
                    ->configurePage('portrait')
                    ->formatTitle("A1:D1")
                    ->setAutoSizeRange("A", $this->last_column)
                    ->formatHeaderRow("A2:{$this->last_column}2")
                    ->applyBorders("A3:{$this->last_column}{$this->rows}")
                    ->applyNumberFormats("B3:{$this->last_column}{$totalsRow}", '_(* #,##0.00_);_(* (#,##0.00);_(* "-"??_);_(@_)')
                    ->formatTotals("B{$totalsRow}:{$this->last_column}{$totalsRow}");

                $this->addSubTotals();


                $this->sheet->freezePane('J3');

                $this->sheet->setAutoFilter("A2:{$this->last_column}{$this->rows}");

                // Adjust DialGroup column width
                // $this->sheet->getColumnDimension('A')->setWidth(10);
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
        $first_hours_column = 'B';

        foreach (range($first_hours_column, $this->last_column) as $letter) {
            $this->sheet->setCellValue(
                "{$letter}{$totalsRow}",
                "=SUBTOTAL(9, {$letter}3:{$letter}{$this->rows})"
            );
        }
    }
}
