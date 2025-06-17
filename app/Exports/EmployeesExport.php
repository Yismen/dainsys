<?php

namespace App\Exports;

class EmployeesExport extends AbstractEmployeesExport
{
    public function __construct(protected $scope)
    {
    }

    public function query()
    {
        $status = $this->scope;

        return $this->baseQuery()
            // ->when($this->date_from, fn ($q) => $q->where('hire_date', '>=', $this->date_from))
            // ->when($this->date_to, fn ($q) => $q->where('hire_date', '<=', $this->date_to))
            ->$status();
    }

    public function title(): string
    {
        return str(implode(' ', [
            'Employees',
            $this->scope,
        ]))->headline();
    }
}
