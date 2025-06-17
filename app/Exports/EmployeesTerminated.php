<?php

namespace App\Exports;

class EmployeesTerminated extends AbstractEmployeesExport
{
    /**
     * : View.
     *
     * @return Excel file
     */
    public function query()
    {
        return $this->baseQuery()
            ->whereHas('termination', function ($query): void {
                $query
                    ->when($this->date_from, fn ($q) => $q->whereDate('termination_date', '>=', $this->date_from))
                    ->when($this->date_to, fn ($q) => $q->whereDate('termination_date', '<=', $this->date_to));
            });
    }

    public function prepareRows($rows)
    {
        return $rows->sortBy(fn($query) => $query->termination->termination_date);
    }

    public function title(): string
    {
        return 'Employees Terminated';
    }
}
