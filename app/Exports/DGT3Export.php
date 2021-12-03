<?php

namespace App\Exports;

use App\Repositories\HumanResources\Employees\Reports;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DGT3Export implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $results = (new Reports())
            ->dgt3(request('year'))
            ->get();

        return view('human_resources.reports.dgt3_results', compact('results'));
    }
}
