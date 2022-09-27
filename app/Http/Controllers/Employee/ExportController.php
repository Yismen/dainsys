<?php

namespace App\Http\Controllers\Employee;

use App\Exports\EmployeesExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function __construct()
    {
        $this->middleware('authorize:view-employees');
    }

    /**
     * Allows to export employees to excel by status
     *
     * @param  string   $status
     * @return download file
     */
    public function toExcel($status)
    {
        return Excel::download(new EmployeesExport($status), 'employees.xlsx');
    }
}
