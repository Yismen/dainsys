<?php

namespace App\Http\Controllers\Api\Performances;

use Carbon\Carbon;
use App\Performance;
use App\Http\Controllers\Controller;
use App\Http\Resources\PerformanceResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PerformancesController extends Controller
{
    /**
     * Returns a collection of performances data for many months back.
     *
     * @param integer $many The amount of months back to filter data. Example=Example /performances/performance_data/last/{many}/months
     * @queryParam campaign string Filter data by campaign name. Example /performances/performance_data/last/{many}/months?campaign=%POL-%.
     * @queryParam employee string Filter data by employee name. Example /performances/performance_data/last/{many}/months?employee=%Yismen Jore%.
     * @queryParam supervisor string Filter data by supervisor name. Example /performances/performance_data/last/{many}/months?supervisor=%Yismen Jore%.
     * @queryParam project_campaign string Filter data by project_campaign name. Example /performances/performance_data/last/{many}/months?project_campaign=%blackhawk%.
     * @queryParam project_employee string Filter data by project_employee name. Example /performances/performance_data/last/{many}/months?project_campaign=%blackhawk%.
     * @queryParam site string Filter data by site name. Example /performances/performance_data/last/{many}/months?site=%Santiago HQ%.
     * @queryParam source string Filter data by source name. Example /performances/performance_data/last/{many}/months?source=%Santiago HQ%.
     * @queryParam client string Filter data by client name. Example /performances/performance_data/last/{many}/months?client=%blackhawk%.
     * @queryParam supervisor_employee string Filter data by supervisor_employee name. Example /performances/performance_data/last/{many}/months?supervisor_employee=%Yismen Jore%.
     * @return \ Illuminate\Http\Resources\Json\JsonResource
     */
    public function data(int $many = 3): JsonResource
    {
        --$many;

        $many = $many <= 0 ? 0 : $many;

        ini_set('memory_limit', config('dainsys.memory_limit'));
        ini_set('max_execution_time', 240);

        $start_of_month = Carbon::now()->subMonths((int)$many)->startOfMonth();

        $performances = Performance::with(['supervisor', 'downtimeReason'])
            ->with(['campaign' => function ($query) {
                $query->with(['source', 'project.client']);
            }])
            ->with(['employee' => function ($query) {
                $query
                    ->with(['supervisor', 'site', 'termination', 'position.department', 'project', 'punch']);
            }])
            ->whereDate('date', '>=', $start_of_month)
            ->filter(request()->all())
            ->get();

        return PerformanceResource::collection($performances);
    }
}
