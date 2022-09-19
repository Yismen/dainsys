<?php

namespace App\Exports;

use App\Models\Employee;

class EmployeesHired extends Employees
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
        return Employee::query()
            ->orderBy('first_name')
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
            ])
            ->when($this->date_from, fn ($q) => $q->where('hire_date', '>=', $this->date_from))
            ->when($this->date_to, fn ($q) => $q->where('hire_date', '<=', $this->date_to));
    }

    public function title(): string
    {
        return 'Employees Hired';
    }
}
