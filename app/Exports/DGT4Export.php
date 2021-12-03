<?php

namespace App\Exports;

use App\Repositories\HumanResources\Employees\Reports;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DGT4Export implements FromView
{
    public function view(): View
    {
        $results = (new Reports())->dgt4(request()->year, request()->month)->get();

        return view('human_resources.reports.dgt4_results', compact('results'));
    }
}
