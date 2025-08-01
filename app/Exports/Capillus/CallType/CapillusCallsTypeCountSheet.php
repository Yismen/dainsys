<?php

namespace App\Exports\Capillus\CallType;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithPreCalculateFormulas;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;

class CapillusCallsTypeCountSheet implements FromView, WithEvents, WithPreCalculateFormulas, WithTitle
{
    protected $sheet;

    protected $count;

    public function __construct(protected $report_data)
    {
        $this->count = count($this->report_data);
        $this->count = $this->count > 0 ? $this->count : 1;
    }

    public function view(): View
    {
        return view('exports.capillus.calltype.count', [
            'data' => $this->report_data,
        ]);
    }

    public function title(): string
    {
        return 'Call Source';
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event): void {
                // auto
                $this->sheet = $event->sheet->getDelegate();

                $this->configurePage()
                    ->setColumnsWidth();

                $this->sheet->setAutoFilter("A1:H{$this->count}");
                $this->sheet->freezePane('D2');
            },
        ];
    }

    protected function setColumnsWidth()
    {
        $this->sheet->getDefaultColumnDimension()->setWidth(10);

        $this->sheet->getRowDimension('1')->setRowHeight(32);

        foreach (range(1, 8) as $col) {
            $this->sheet->getColumnDimensionByColumn($col)
                ->setAutoSize(true);
        }

        return $this;
    }

    protected function configurePage()
    {
        $this->sheet->getPageSetup()
            ->setPrintArea("A1:O{$this->count}")
            ->setFitToWidth(1)
            ->setFitToHeight(1000)
            ->setOrientation(PageSetup::ORIENTATION_LANDSCAPE);

        $this->sheet->getPageMargins()
            ->setTop(0.5)
            ->setBottom(0.17)
            ->setRight(0.17)
            ->setLeft(0.17);

        return $this;
    }
}
