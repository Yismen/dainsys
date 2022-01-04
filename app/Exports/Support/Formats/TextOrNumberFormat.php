<?php

namespace App\Exports\Support\Formats;

class TextOrNumberFormat
{
    public static function apply(
        $sheet,
        string $range,
        string $format = '0.00'
    ) {
        $sheet->getStyle($range)->getNumberFormat()->setFormatCode($format);
    }
}
