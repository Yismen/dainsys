<?php

namespace App\Console\Commands\Inbound\Sheets;

use App\Exports\RangeFormarter;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithPreCalculateFormulas;

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

    protected string $view;

    protected string $client;

    protected string $date_from;

    protected array $working_range;

    protected $date_to;

    protected $totals_row;
    protected $total_hours_column;
    protected $total_calls_column;
    protected $total_sales_column;
    protected $first_column;
    protected $first_hours_column;

    public function __construct(array $data, string $client, string $period_name, $date_from, $date_to)
    {
        $this->data = $data;
        $this->client = $client;
        $this->date_from = $date_from;
        $this->date_to = $date_to;
        $this->sheetName = "{$period_name} Inbound Report";
        $this->hours_data = collect($this->data['period_hours_parser']);

        $this->calls_data = collect($this->data['period_calls_parser']);
        $this->first_hours_column = 'B';
        $this->working_range = range('A', 'M');

        $this->dates = $this->hours_data->pluck('Report Date')->unique()->sort();
        $this->names = $this->hours_data->pluck('agent_name')->unique()->sort()->filter(function ($name) {
            $calls = $this->calls_data->first(fn ($item) => $item->agent_name === $name);

            return $calls->total_calls ?? 0 > 0;
        });

        $this->rows = $this->names->count() + 2;
        $this->view = 'exports.inbound.periods.report';
        $this->last_column = $this->working_range[$this->dates->count() + 4];

        $this->totals_row = $this->rows + 1;
        $this->total_hours_column = $this->working_range[$this->dates->count() + 1];
        $this->total_calls_column = $this->working_range[$this->dates->count() + 2];
        $this->total_sales_column = $this->working_range[$this->dates->count() + 3];
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
                // auto
                $this->sheet = $event->sheet->getDelegate();
                $this->sheet->getColumnDimension('A')->setWidth(30);

                $this->addSubTotals();

                (new RangeFormarter($event, "A1:{$this->last_column}{$this->rows}"))
                    ->configurePage('landscape')
                    ->formatTitle('A1:E1')
                    ->formatHeaderRow("A2:{$this->last_column}2")
                    ->applyBorders("A3:{$this->last_column}{$this->rows}")
                    ->applyNumberFormats("A3:{$this->total_hours_column}{$this->totals_row}", '_(* #,##0.00_);_(* (#,##0.00);_(* "-"??_);_(@_)')
                    ->applyNumberFormats("{$this->total_calls_column}3:{$this->total_sales_column}{$this->totals_row}", '_(* #,##0_);_(* (#,##0);_(* "-"??_);_(@_)')
                    ->applyNumberFormats("{$this->last_column}3:{$this->last_column}{$this->totals_row}", '_(* #,##0%_);_(* (#,##0%);_(* "-"??_);_(@_)')
                    ->formatTotals("B{$this->totals_row}:{$this->last_column}{$this->totals_row}")
                    ->applyFontBoldToRange("{$this->total_hours_column}3:{$this->last_column}{$this->rows}")
                    ->applyBgToRange("{$this->total_hours_column}3:{$this->last_column}{$this->rows}", 'F8F7FF')
                    ->setColumnsRangeWidth('B', $this->last_column, 12);

                $this->sheet->freezePane('B3');

                $this->sheet->setAutoFilter("A2:{$this->last_column}{$this->rows}");

                // Adjust DialGroup column width
            },
        ];
    }

    public function title(): string
    {
        return $this->sheetName;
    }

    protected function addSubTotals()
    {
        // Sums
        foreach (range($this->first_hours_column, $this->total_sales_column) as $letter) {
            $this->sheet->setCellValue(
                "{$letter}{$this->totals_row}",
                "=SUBTOTAL(9, {$letter}3:{$letter}{$this->rows})"
            );
        }
        // Conversion Rate
        $this->sheet->setCellValue(
            "{$this->last_column}{$this->totals_row}",
            "={$this->total_sales_column}{$this->totals_row}/{$this->total_calls_column}{$this->totals_row}"
        );
    }
}
