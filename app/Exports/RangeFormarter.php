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

    public function setAutoFilter(string $range)
    {
        $this->sheet->setAutoFilter($range);

        return $this;
    }

    public function freezePane(string $cell, $topLeftCell = null)
    {
        $this->sheet->freezePane($cell, $topLeftCell);

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

    /**
     * Set auto size columns
     *
     * @param  $to_column,  if null asumes $from_column
     * @return $this
     */
    public function setAutoSizeRange(string $from_column, $to_column = null)
    {
        $to_column = $to_column ?: $from_column;

        foreach (range($from_column, $to_column) as $col) {
            $this->sheet->getColumnDimension($col)
                ->setAutoSize(true);
        }

        return $this;
    }

    public function setColumnsRangeWidth(string $from_column, string $to_column, int $width = 11)
    {
        foreach (range($from_column, $to_column) as $col) {
            $this->sheet->getColumnDimension($col)->setWidth($width);
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
                    'bold' => true,
                ],
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'color' => [
                        'rgb' => '000000',
                    ],
                ],
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_LEFT,
                ],
                'borders' => [
                    'outline' => [
                        'borderStyle' => Border::BORDER_THIN,
                        'color' => ['rgb' => '000000'],
                    ],
                    'inside' => [
                        'borderStyle' => Border::BORDER_THIN,
                        'color' => ['rgb' => '000000'],
                    ],
                ],
            ]);

        return $this;
    }

    public function applyFontBoldToRange(string $range)
    {
        $this->sheet
            ->getStyle($range)
            ->applyFromArray([
                'font' => [
                    'bold' => true,
                ],
            ]);

        return $this;
    }

    public function applyBgToRange(string $range, string $color)
    {
        $this->sheet
            ->getStyle($range)
            ->applyFromArray([
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'color' => [
                        'rgb' => $color,
                    ],
                ],
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
                    'italic' => true,
                ],
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'color' => [
                        'rgb' => 'EDEDED',
                    ],
                ],
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_RIGHT,
                ],
                'borders' => [
                    'outline' => [
                        'borderStyle' => Border::BORDER_THIN,
                        'color' => ['rgb' => '000000'],
                    ],
                    'inside' => [
                        'borderStyle' => Border::BORDER_THIN,
                        'color' => ['rgb' => '000000'],
                    ],
                ],
            ]);

        return $this;
    }

    /**
     * Set Height Row.
     *
     * @param  int  $height  . -1 for Auto
     * @return object
     */
    public function setRowHeight(int $row, int $height = 12)
    {
        $this->sheet->getRowDimension($row)->setRowHeight($height);

        return $this;
    }

    /**
     * Set Height Row.
     *
     * @param  int  $row
     * @param  int  $height  . -1 for Auto
     * @return object
     */
    public function setMultipleRowsHeight(int $from_row, int $to_row, int $height = 12)
    {
        foreach (range($from_row, $to_row) as $row) {
            $this->sheet->getRowDimension($row)->setRowHeight($height);
        }

        return $this;
    }

    public function formatHeaderRow(string $range, int $row_height = 45)
    {
        $this->sheet->getStyle($range)->getAlignment()->setWrapText(true);

        $this->sheet->getStyle($range)
            ->applyFromArray([
                'font' => [
                    'bold' => true,
                ],
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'color' => [
                        'rgb' => 'ededed',
                    ],
                ],
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                    'vertical' => Alignment::VERTICAL_TOP,
                ],
                'borders' => [
                    'outline' => [
                        'borderStyle' => Border::BORDER_MEDIUM,
                        'color' => ['rgb' => '000000'],
                    ],
                    'inside' => [
                        'borderStyle' => Border::BORDER_THIN,
                        'color' => ['rgb' => '000000'],
                    ],
                ],
            ]);

        // Set auto height
        preg_match_all('!\d+!', $range, $rows);

        foreach (range($rows[0][0], $rows[0][1] ?? $rows[0][0]) as $row) {
            $this->sheet->getRowDimension((int) $row)->setRowHeight($row_height);
        }

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
                    ],
                ],
            ]);

        return $this;
    }

    public function applyNumberFormats($range, $format = '_(* #,##0.00_);_(* (#,##0.00);_(* "-"??_);_(@_)')
    {
        $this->sheet->getStyle($range)->getNumberFormat()->setFormatCode($format);

        return $this;
    }
}
