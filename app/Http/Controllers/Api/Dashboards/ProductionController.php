<?php

namespace App\Http\Controllers\Api\Dashboards;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\PerformanceRepository;

class ProductionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mtd_stats(Request $request)
    {
        $performance_repo = new PerformanceRepository();

        $mtdData = $performance_repo->monthToDateData();

        return [
            'revenue_mtd' => number_format($mtdData->sum('revenue'), 2),
            'login_hours_mtd' => number_format($mtdData->sum('login_time'), 2),
            'production_hours_mtd' => number_format($mtdData->sum('production_time'), 2),
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function monthly_stats(Request $request)
    {
        $performance_repo = new PerformanceRepository();

        $mtdData = $performance_repo->monthToDateData();

        return $data = $performance_repo->monthlyManyMonths(12);
    }
}
