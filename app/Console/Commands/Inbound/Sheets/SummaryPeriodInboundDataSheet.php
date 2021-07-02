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

class SummaryPeriodInboundDataSheet implements FromView, WithTitle, WithEvents, WithPreCalculateFormulas
{
    protected $data;
    protected $names;
    protected $dates;
    protected $hours_data;
    protected $calls_data;

    protected $sheet;

    protected $rows;
    protected $last_column;

    protected $sheetName;

    protected String $view;

    protected string $client;

    protected string $date_from;

    protected array $working_range;

    protected $date_to;

    public function __construct(array $data, string $client, string $period_name, $date_from, $date_to)
    {
        $this->data = $data;
        $this->client = $client;
        $this->date_from = $date_from;
        $this->date_to = $date_to;
        $this->sheetName = "{$period_name} Inbound Report";
        $this->hours_data = collect($this->data['period_hours_parser']);
        $this->calls_data = collect($this->data['period_calls_parser']);
        $this->working_range = range("A", "M");

        $this->dates = $this->hours_data->pluck('Report Date')->unique()->sort();
        $this->names = $this->hours_data->pluck('agent_name')->unique()->sort();
        $this->rows = $this->names->count() + 2;
        $this->view = 'exports.inbound.periods.report';
        $this->last_column = $this->working_range[$this->dates->count() + 4];
    }

    public function view(): View
    {
        return view($this->view, [
            'data' => $this->data,
            'dates' => $this->dates,
            'names' => $this->names,
            'hours_data' => $this->hours_data,
            'calls_data' => $this->calls_data,
            'title' => "{$this->sheetName}, from {$this->date_from} to {$this->date_to}",
        ]);
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $totalsRow = $this->rows + 1;
                $total_hours_column = $this->working_range[$this->dates->count() + 1];
                $calls_column = $this->working_range[$this->dates->count() + 2];
                $sales_column = $this->working_range[$this->dates->count() + 3];
                $totalsRow = $this->rows + 1;

                // auto
                $this->sheet = $event->sheet->getDelegate();
                $this->sheet->getColumnDimension('A')->setWidth(30);

                $this->addSubTotals();

                (new RangeFormarter($event, "A1:{$this->last_column}{$this->rows}"))
                    ->configurePage('landscape')
                    ->formatTitle("A1:E1")
                    ->formatHeaderRow("A2:{$this->last_column}2")
                    ->applyBorders("A3:{$this->last_column}{$this->rows}")
                    ->applyNumberFormats("A3:{$total_hours_column}{$totalsRow}", '_(* #,##0.00_);_(* (#,##0.00);_(* "-"??_);_(@_)')
                    ->applyNumberFormats("{$calls_column}3:{$sales_column}{$totalsRow}", '_(* #,##0_);_(* (#,##0);_(* "-"??_);_(@_)')
                    ->applyNumberFormats("{$this->last_column}3:{$this->last_column}{$totalsRow}", '_(* #,##0%_);_(* (#,##0%);_(* "-"??_);_(@_)')
                    ->formatTotals("B{$totalsRow}:{$this->last_column}{$totalsRow}")
                    ->setColumnsRangeWidth("B", $this->last_column, 12);


                $this->sheet->freezePane('B3');

                $this->sheet->setAutoFilter("A2:{$this->last_column}{$this->rows}");

                // Adjust DialGroup column width
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
