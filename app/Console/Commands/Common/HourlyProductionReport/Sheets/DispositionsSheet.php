<?php

namespace App\Console\Commands\Common\HourlyProductionReport\Sheets;

use App\Exports\RangeFormarter;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithPreCalculateFormulas;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class DispositionsSheet implements FromView, WithEvents, WithPreCalculateFormulas, WithTitle
{
    protected $data;

    protected $sheet;

    protected $rows;

    protected $last_column;

    protected $view;

    public function __construct(array $data, protected $sheetName, protected $title, string $view = 'exports.dispositions')
    {
        $this->data = $data;

        $this->rows = count($this->data) + 2;
        $this->last_column = 'F';
        $this->view = $view;
    }

    public function view(): View
    {
        return view($this->view, [
            'data' => $this->data,
            'dispositionsTitle' => $this->title,
        ]);
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event): void {
                // auto
                $this->sheet = $event->sheet->getDelegate();

                (new RangeFormarter($event, "A1:{$this->last_column}{$this->rows}"))
                    ->configurePage()
                    ->setColumnsWidth('A', 'C')
                    ->formatTitle('A1:D1')
                    ->formatHeaderRow("A2:{$this->last_column}2")
                    ->applyBorders("A3:{$this->last_column}{$this->rows}")
                    // ->applyNumberFormats("E2:G{$this->rows}", '#,##0.00')
                    ->applyNumberFormats("{$this->last_column}2:{$this->last_column}{$this->rows}", NumberFormat::FORMAT_PERCENTAGE_00);

                $this->sheet->setAutoFilter("A2:{$this->last_column}{$this->rows}");
            },
        ];
    }

    public function title(): string
    {
        return $this->sheetName;
    }
}
