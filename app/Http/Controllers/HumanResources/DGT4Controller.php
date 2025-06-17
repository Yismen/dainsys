<?php

namespace App\Http\Controllers\HumanResources;

use App\Exports\DGT4Export;
use App\Http\Controllers\Controller;
use App\Repositories\HumanResources\Employees\Reports;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DGT4Controller extends Controller
{
    public function dgt4()
    {
        return view('human_resources.reports.dgt4');
    }

    public function handleDgt4(Request $request, Reports $report)
    {
        $this->validate($request, [
            'year' => 'required|integer',
            'month' => 'required|integer|between:1,12',
        ]);

        $results = $report->dgt4($request->year, $request->month)->get();

        $request->flash();

        return view('human_resources.reports.dgt4', compact('results'));
    }

    public function excel(Request $request, Reports $report)
    {
        $file_name = 'DGT4-'.request('year').'.xlsx';

        $request->flash();

        return Excel::download(DGT4Export::class, $file_name);
    }
}
