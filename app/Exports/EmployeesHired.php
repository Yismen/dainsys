<?php

namespace App\Exports;

class EmployeesHired extends AbstractEmployeesExport
{
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
