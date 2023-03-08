<?php

namespace App\Imports;

use App\Http\Requests\OvernightHour\CreateOvernightHourRequest;
use App\Models\OvernightHour;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithValidation;

class OvernightHoutImport implements ToModel, WithHeadingRow, WithValidation, WithMapping
{
    use Importable;

    protected $file_name;

    public function model(array $row)
    {
        (new OvernightHour())
            ->removeDuplicated($row['unique_id']);

        return new OvernightHour([
            'date' => $row['date'],
            'employee_id' => $row['employee_id'],
            'hours' => $row['hours'],
            'unique_id' => $row['unique_id'],
        ]);
    }

    public function rules(): array
    {
        return (new CreateOvernightHourRequest())->rules();
    }

    /**
     * Convert an date in a carbon instance.
     *
     * @param value  $value  the value to be parsed
     * @param format $format the format from where the carbon instance is created
     *
     * @return Carbon instance
     */
    public function transformDate($value, $format = 'Y-m-d')
    {
        try {
            return Carbon::instance(
                \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value)
            );
        } catch (\ErrorException $e) {
            return Carbon::createFromFormat($format, $value);
        }
    }

    public function map($row): array
    {
        return [
            'unique_id' => $row['unique_id'],
            'date' => $this->transformDate($row['date']),
            'employee_id' => $row['employee_id'],
            'hours' => $row['hours'],
        ];
    }
}
