<?php

namespace App\Exports;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

abstract class AbstractEmployeesExport implements FromQuery, WithTitle, ShouldAutoSize, WithColumnFormatting, WithMapping, WithHeadings, WithEvents
{
    use Exportable;

    protected $date_from = null;
    protected $date_to = null;
    protected $site = null;

    public function __construct($date_from = null, $date_to = null, ?string $site = null)
    {
        $this->date_from = $date_from;
        $this->date_to = $date_to;
        $this->site = $site;
    }

    public function registerEvents(): array
    {
        return [
        ];
    }

    public function title(): string
    {
        return 'Employees';
    }

    public function baseQuery(): Builder
    {
        return Employee::query()
            ->orderBy('first_name')
            ->when($this->site, function ($query) {
                $query->whereHas('site', function ($query) {
                    $query->where('name', 'like', "{$this->site}%");
                });
            })
            ->with([
                'punch',
                'address',
                'gender',
                'marital',
                'nationality',
                'site',
                'project',
                'position' => function ($query) {
                    $query->with([
                        'department',
                        'payment_type',
                    ]);
                },
                'bankAccount',
                'supervisor',
                'termination',
            ]);
    }

    public function map($employee): array
    {
        return [
            $employee->id,
            $employee->full_name,
            $employee->first_name,
            $employee->second_first_name,
            $employee->last_name,
            $employee->second_last_name,
            optional($employee->punch)->punch,
            filled($employee->personal_id) ? $employee->personal_id : $employee->passport,
            Date::dateTimeToExcel($employee->hire_date),
            Date::dateTimeToExcel($employee->date_of_birth),
            substr($employee->cellphone_number, 0, 3),
            substr($employee->cellphone_number, -7),
            $employee->address === null ? '' :
                $employee->address->street_address . ', ' . $employee->address->sector . ', ' . $employee->address->city,
            substr(optional($employee->gender)->name, 0, 1),
            optional($employee->marital)->name,
            optional($employee->nationality)->name,
            optional($employee->site)->name,
            optional($employee->project)->name,
            optional($employee->position)->name,
            optional(optional($employee->position)->department)->name,
            optional($employee->supervisor)->name,
            optional($employee->position)->salary,
            optional($employee->position)->pay_per_hours,
            optional($employee->bankAccount)->account_number,
            $employee->status,
            $employee->termination ? Date::dateTimeToExcel($employee->termination->termination_date) : '',
            optional(optional($employee->termination)->terminationType)->name,
        ];
    }

    public function columnFormats(): array
    {
        return [
            'I' => NumberFormat::FORMAT_DATE_XLSX15,
            'J' => NumberFormat::FORMAT_DATE_XLSX15,
            'G' => NumberFormat::FORMAT_TEXT,
            'H' => NumberFormat::FORMAT_TEXT,
            'K' => NumberFormat::FORMAT_TEXT,
            'L' => NumberFormat::FORMAT_TEXT,
            'V' => NumberFormat::FORMAT_NUMBER,
            'W' => NumberFormat::FORMAT_NUMBER,
            'X' => NumberFormat::FORMAT_NUMBER,
            'Z' => NumberFormat::FORMAT_DATE_XLSX15,
        ];
    }

    public function headings(): array
    {
        return [
            'Employee ID',
            'Full Name',
            'First Name',
            'Second First Name',
            'Last Name',
            'Second Last name',
            'Punch ID',
            'Personal ID or Passport',
            'Hire Date',
            'Date of Birth',
            'Phone Area',
            'Phone Number',
            'Address',
            'Gender',
            'Relationship',
            'Nationality',
            'Site',
            'Project',
            'Position',
            'Department',
            'Supervisor',
            'Salary',
            'Hourly Pay',
            'Account Number',
            'Status',
            'Termination Date',
            'Termination Type',
        ];
    }

    public function hasData(): bool
    {
        return $this->query()->count() > 0;
    }
}
