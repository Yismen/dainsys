<?php

namespace App\Http\Controllers\Api\Performances;

use Carbon\Carbon;
use App\Performance;
use App\Http\Controllers\Controller;
use App\Http\Resources\PerformanceResource;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @group Performances
 */
class PerformancesController extends Controller
{
    /**
     * Performances Data
     *
     * Collection of performances data for many months back.
     *
     * @urlParam many integer The amount of months back to filter data. Example /performances/performance_data/last/3/months
     * @queryParam campaign string Filter data by campaign name. Example ?campaign=%POL-%.
     * @queryParam employee string Filter data by employee name. Example ?employee=%Yismen Jore%.
     * @queryParam supervisor string Filter data by supervisor name. Example ?supervisor=%Yismen Jore%.
     * @queryParam project_campaign string Filter data by project_campaign name. Example ?project_campaign=%blackhawk%.
     * @queryParam project_employee string Filter data by project_employee name. Example ?project_campaign=%blackhawk%.
     * @queryParam site string Filter data by site name. Example ?site=%Santiago HQ%.
     * @queryParam source string Filter data by source name. Example ?source=%Santiago HQ%.
     * @queryParam client string Filter data by client name. Example ?client=%blackhawk%.
     * @queryParam supervisor_employee string Filter data by supervisor_employee name. Example ?supervisor_employee=%Yismen Jore%.
     *
     * @response 200 {
     *      "data": [
     *          {
     *              "unique_id": "2021-11-01-10007-1",
     *              "away_time": 0,
     *              "billable_hours": 0,
     *              "break_time": 0,
     *              "calls": 0,
     *              "campaign_sph_goal": 0,
     *              "campaign": "asdfasfas-downtimes",
     *              "cc_sales": 0,
     *              "client": null,
     *              "contacts": 0,
     *              "date": "2021-11-01",
     *              "department": "Sarah Schmeler",
     *              "dontime_reason": "Falta De Trabajo",
     *              "employee_id": 10007,
     *              "employee_name": "Dorcas Iliana Turner Robel",
     *              "first_name": "Dorcas",
     *              "hire_date": "2004-08-04",
     *              "last_name": "Turner",
     *              "login_time": 8,
     *              "lunch_time": 0,
     *              "off_hook_time": 0,
     *              "pending_dispo_time": 0,
     *              "production_time": 0,
     *              "project_employee": "Jaycee Kris",
     *              "project_performance": "Administracion",
     *              "punch_id": null,
     *              "reported_by": "Bianka Quitzon",
     *              "revenue": 0,
     *              "salary": 125,
     *              "sales": 0,
     *              "second_first_name": "Iliana",
     *              "second_last_name": "Robel",
     *              "site": "Anabel Hammes",
     *              "source": "Data Entry",
     *              "status": "Active",
     *              "supervisor_employee": "Kiley Kirlin",
     *              "supervisor_performance": "Kiley Kirlin",
     *              "talk_time": 0,
     *              "training_time": 0,
     *              "upsales": 0
     *          }
     *      ]
     *  }
     */
    public function data(int $many = 3): JsonResource
    {
        --$many;

        $many = $many <= 0 ? 0 : $many;

        ini_set('memory_limit', config('dainsys.memory_limit'));
        ini_set('max_execution_time', 240);

        $start_of_month = Carbon::now()->subMonths((int)$many)->startOfMonth();

        $performances = Performance::query()
            ->with([
                'supervisor',
                'downtimeReason'
            ])
            ->with(['campaign' => function ($query) {
                $query->with([
                    'source',
                    'project.client'
                ]);
            }])
            ->with(['employee' => function ($query) {
                $query->with([
                    'supervisor',
                    'site',
                    'termination',
                    'position.department',
                    'project',
                    'punch'
                ]);
            }])
            ->whereDate('date', '>=', $start_of_month)
            ->filter(request()->all())
            ->get();

        return PerformanceResource::collection($performances);
    }
}
