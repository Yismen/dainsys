<?php

namespace App\Http\Controllers\Api\Dashboards;

use App\Http\Controllers\Controller;
use App\Repositories\PerformanceRepository;
use Illuminate\Http\Request;

/**
 * @group Dashboards
 */
class ProductionController extends Controller
{
    /**
     * Dashboards Production Month To Date Stats
     *
     * Production MTD stats for production dashboard
     *
     * @queryParam campaign string Limit results to specific campaign. Example ?campaign=%Santiago%
     * @queryParam source string Limit results to specific source. Example ?source=%Santiago%
     * @queryParam employee string Limit results to specific employee. Example ?employee=%Santiago%
     * @queryParam supervisor string Limit results to specific supervisor. Example ?supervisor=%Santiago%
     * @queryParam supervisor_employee string Limit results to specific supervisor_employee. Example ?supervisor_employee=%Santiago%
     * @queryParam project_campaign string Limit results to specific project_campaign. Example ?project_campaign=%Santiago%
     * @queryParam project_employee string Limit results to specific project_employee. Example ?project_employee=%Santiago%
     * @queryParam site string Limit results to specific site. Example ?site=%Santiago%
     * @queryParam client string Limit results to specific client. Example ?client=%Pub%
     *
     * @response 200 {
     *     "revenue_mtd": "0.00",
     *     "login_hours_mtd": "8.00",
     *     "production_hours_mtd": "0.00"
     * }
     */
    public function mtd_stats(Request $request)
    {
        $performance_repo = new PerformanceRepository();

        $mtdData = $performance_repo->monthToDateData();

        return [
            'revenue_mtd' => number_format($mtdData->sum('revenue'), 2),
            'login_hours_mtd' => number_format($mtdData->sum('login_time'), 2),
            'production_hours_mtd' => number_format($mtdData->sum('production_time'), 2),
            'billable_hours_mtd' => number_format($mtdData->sum('billable_hours'), 2),

        ];
    }

    /**
     * Dashboards Production Monthly Stats
     *
     * Production Monthly stats for production dashboard
     *
     * @queryParam campaign string Limit results to specific campaign. Example ?campaign=%Santiago%
     * @queryParam source string Limit results to specific source. Example ?source=%Santiago%
     * @queryParam employee string Limit results to specific employee. Example ?employee=%Santiago%
     * @queryParam supervisor string Limit results to specific supervisor. Example ?supervisor=%Santiago%
     * @queryParam supervisor_employee string Limit results to specific supervisor_employee. Example ?supervisor_employee=%Santiago%
     * @queryParam project_campaign string Limit results to specific project_campaign. Example ?project_campaign=%Santiago%
     * @queryParam project_employee string Limit results to specific project_employee. Example ?project_employee=%Santiago%
     * @queryParam site string Limit results to specific site. Example ?site=%Santiago%
     * @queryParam client string Limit results to specific client. Example ?client=%Pub%
     *
     * @response 200 [
     *      {
     *          "revenue": 0,
     *          "login_time": 5,
     *          "rph": 0,
     *          "sales": "0",
     *          "production_time": 0,
     *          "sph": null,
     *          "efficiency": 0,
     *          "sph_goal": null,
     *          "month": "2021-Oct"
     *      }
     *  ]
     */
    public function monthly_stats(Request $request)
    {
        $performance_repo = new PerformanceRepository();

        $mtdData = $performance_repo->monthToDateData();

        return $data = $performance_repo->monthlyManyMonths(11);
    }
}
