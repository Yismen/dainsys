<?php

namespace App\Exports;

use App\Models\Employee;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;

class LoginNameEployees implements FromView, ShouldAutoSize, WithTitle
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
