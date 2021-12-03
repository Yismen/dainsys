<?php

namespace App\Http\Controllers\HumanResources;

use App\Exports\DGT3Export;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Repositories\HumanResources\Employees\Reports;

class DGT3Controller extends Controller
{
    public function dgt3()
    {
        return view('human_resources.reports.dgt3');
    }

    public function handleDgt3(Request $request, Reports $report)
    {
        $this->validate($request, [
            'year' => 'required|integer',
        ]);

        $results = $report->dgt3($request->year)->get();

        $request->flash();

        return view('human_resources.reports.dgt3', compact('results'));
    }

    public function excel(Request $request, Reports $report)
    {
        $results = $report->dgt3($request->year)->get();
        $file_name = 'DGT3-' . request('year') . '.xlsx';

        $request->flash();

        Excel::download(DGT3Export::class, $file_name);

        return view('human_resources.reports.dgt3', compact('results'));
    }
}
