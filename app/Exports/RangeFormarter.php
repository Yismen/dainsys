<?php

namespace App\Exports;

use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;

class RangeFormarter
{
    protected $range;

    protected $sheet;

    public function __construct(AfterSheet $event, string $range, int $width = 10, int $height = 15)
    {
        $this->range = $range;

        $this->sheet = $event->sheet->getDelegate();
        $this->sheet->getDefaultColumnDimension()->setWidth($width);
        $this->sheet->getDefaultRowDimension()->setRowHeight($height);
    }

    public function configurePage($orientation = PageSetup::ORIENTATION_LANDSCAPE)
    {
        $this->sheet->getPageSetup()
            ->setPrintArea($this->range)
            ->setFitToWidth(1)
            ->setFitToHeight(5)
            ->setOrientation($orientation);

        $this->sheet->getPageMargins()
            ->setTop(0.5)
            ->setBottom(0.17)
            ->setRight(0.17)
            ->setLeft(0.17);

        return $this;
    }



    public function setColumnsWidth(string $from_column, string $to_column)
    {
        foreach (range($from_column, $to_column) as $col) {
            $this->sheet->getColumnDimension($col)
                ->setAutoSize(true);
        }

        return $this;
    }

    public function formatTitle(string $range)
    {
        $this->sheet->getStyle($range)
            ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);

        $this->sheet
            ->getStyle($range)
            ->applyFromArray([
                'font' => [
                    'bold' => true
                ],
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'color' => [
                        'rgb' => '000000',
                    ],
                ],
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_LEFT
                ],
                'borders' => [
                    'outline' => [
                        'borderStyle' => Border::BORDER_THIN,
                        'color' => ['rgb' => '000000'],
                    ],
                    'inside' => [
                        'borderStyle' => Border::BORDER_THIN,
                        'color' => ['rgb' => '000000'],
                    ]
                ]
            ]);

        return $this;
    }

    public function formatTotals(string $range)
    {
        $this->sheet->getStyle($range)
            ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);

        $this->sheet
            ->getStyle($range)
            ->applyFromArray([
                'font' => [
                    'bold' => true,
                    'italic' => true
                ],
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'color' => [
                        'rgb' => 'EDEDED',
                    ],
                ],
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_RIGHT
                ],
                'borders' => [
                    'outline' => [
                        'borderStyle' => Border::BORDER_THIN,
                        'color' => ['rgb' => '000000'],
                    ],
                    'inside' => [
                        'borderStyle' => Border::BORDER_THIN,
                        'color' => ['rgb' => '000000'],
                    ]
                ]
            ]);

        return $this;
    }

    public function formatHeaderRow(string $range, $header_row = 2, $row_height = 32)
    {
        $this->sheet->getStyle($range)->getAlignment()->setWrapText(true);

        $this->sheet->getRowDimension($header_row)->setRowHeight($row_height);

        $this->sheet->getStyle($range)
            ->applyFromArray([
                'font' => [
                    'bold' => true
                ],
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'color' => [
                        'rgb' => 'ededed',
                    ],
                ],
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                    'vertical' => Alignment::VERTICAL_CENTER,
                ],
                'borders' => [
                    'outline' => [
                        'borderStyle' => Border::BORDER_MEDIUM,
                        'color' => ['rgb' => '000000'],
                    ],
                    'inside' => [
                        'borderStyle' => Border::BORDER_THIN,
                        'color' => ['rgb' => '000000'],
                    ]
                ]
            ]);

        return $this;
    }

    public function applyBorders(string $range)
    {
        $this->sheet->getStyle($range)
            ->applyFromArray([
                'borders' => [
                    'outline' => [
                        'borderStyle' => Border::BORDER_THIN,
                        'color' => ['rgb' => '000000'],
                    ],
                    'inside' => [
                        'borderStyle' => Border::BORDER_THIN,
                        'color' => ['rgb' => '000000'],
                    ]
                ]
            ]);

        return $this;
    }

    public function applyNumberFormats($range, $format)
    {
        $this->sheet->getStyle($range)->getNumberFormat()->setFormatCode($format);

        return $this;
    }
}
