<?php

namespace App\Http\Controllers\Api\Performances;

use App\Http\Controllers\Controller;
use App\Http\Resources\DowntimesResource;
use App\Models\Employee;
use App\Models\Performance;
use Carbon\Carbon;

/**
 * @group Performances
 */
class DowntimesController extends Controller
{
    /**
     * Performances Downtimes
     *
     * Collection of dowtimes
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
     *      "data": [
     *          {
     *               "unique_id": "unique-id-1-dsf-3",
     *               "date": "2021-05-17",
     *               "employee_id": 50001,
     *               "campaign": "Some Campaign",
     *               "project_performance": "Some Project",
     *               "employee_name": "Some Employee",
     *               "login_time": 8.21,
     *               "downtime_reason": "falta de Trabajo",
     *               "reported_by": "Yismen Jorge",
     *          }
     *      ]
     *  }
     */
    public function __invoke()
    {
        $downtimes = Performance::query()
            ->with([
                'campaign.project',
                'downtimeReason',
                'employee',
                'supervisor',
            ])
            ->whereHas('campaign', fn ($campaign_query) => $campaign_query->whereHas('project', fn ($project_query) => $project_query->where('name', 'like', '%downtimes%'))
                ->orWhere('name', 'like', '%downtimes%'))
            ->orderBy('date')
            ->when(
                request('months'),
                function ($performance_query): void {
                    $performance_query->whereDate(
                        'date',
                        '>=',
                        Carbon::now()->subMonths((int) request('months'))->startOfMonth()
                    );
                },
                function ($performance_query): void {
                    $performance_query->whereDate(
                        'date',
                        '>=',
                        Carbon::now()->subMonths(4)->startOfMonth()
                    );
                }
            )
            ->filter(request()->all())
            ->get();

        return DowntimesResource::collection($downtimes);
    }
}
