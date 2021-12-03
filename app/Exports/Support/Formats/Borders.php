<?php

namespace App\Exports\Support\Formats;

class Borders
{
    public static function apply(
        $sheet,
        string $range,
        string $position = 'right',
        string $size = 'thin',
        string $color = '000000'
    ) {
        $sheet->getStyle($range)->applyFromArray([
            'borders' => [
                $position => [
                    'borderStyle' => $size,
                    'color' => ['rgb' => $color],
                ],
            ],
        ]);
    }
}
