<?php

namespace App\Exports;

class EmployeesHired extends AbstractEmployeesExport
{
    protected $date_from;
    protected $date_to;

    public function __construct($date_from = null, $date_to = null)
    {
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
