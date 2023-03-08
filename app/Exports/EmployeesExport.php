<?php

namespace App\Exports;

class EmployeesExport extends AbstractEmployeesExport
{
    protected $scope;

    public function __construct($scope)
    {
        $this->scope = $scope;
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
        return str(join(' ', [
            'Employees',
            $this->scope,
        ]))->headline();
    }
}
