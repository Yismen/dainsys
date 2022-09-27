<?php

namespace App\Exports;

class EmployeesExport extends AbstractEmployeesExport
{
    protected $scope;
    protected $date_from;
    protected $date_to;

    public function __construct($scope, $date_from = null, $date_to = null)
    {
        $this->scope = $scope;
        $this->date_from = $date_from;
        $this->date_to = $date_to;
    }

    /**
     * : View.
     *
     * @return Excel file
     */
    public function query()
    {
        return $this->baseQuery()
            ->orderBy('hire_date')
            ->when($this->date_from, fn ($q) => $q->whereDate('hire_date', '>=', $this->date_from))
            ->when($this->date_to, fn ($q) => $q->whereDate('hire_date', '<=', $this->date_to))
        ;
    }

    public function title(): string
    {
        return 'Employees Hired';
    }
}
