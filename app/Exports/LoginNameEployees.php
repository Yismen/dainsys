<?php

namespace App\Exports;

use App\Employee;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class LoginNameEployees implements FromView, WithTitle, ShouldAutoSize
{
    public function view(): View
    {
        $employees = Employee::select('id', 'first_name', 'second_first_name', 'last_name', 'second_last_name')
            ->orderBy('first_name')->with('loginNames')
            ->get();

        return view('login_names.partials.results-to-excel', compact('employees'));
    }

    public function title(): string
    {
        return 'Login Names';
    }
}
