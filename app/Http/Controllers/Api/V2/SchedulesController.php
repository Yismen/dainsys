<?php

namespace App\Http\Controllers\Api\V2;

use App\Http\Controllers\Controller;
use App\Http\Resources\ScheduleResource;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @group Performances
 */
class SchedulesController extends Controller
{
    /**
     * Performances Schedules
     *
     * Collection of employees' schedules, filtered by many days ago.
     *
     * @queryParam daysago int The amount of days to filter back. Default 90. Example daysago=45
     *
     * @response 200 {
     *      "data": [
     *          {
     *              "employee_id": 50001,
     *              "employee_name": "Yismen Jorge",
     *              "supervisor": "Supervisor Name",
     *              "date": "2021-05-19",
     *              "hours": 5.75,
     *          }
     *      ]
     *  }
     */
    public function __invoke(): JsonResource
    {
        $daysago = request('daysago') ?: 90;

        $schedules = Schedule::with(['employee.supervisor'])
            ->orderBy('employee_id')
            ->orderBy('date')
            ->with('employee')
            ->whereDate('date', '>=', Carbon::now()->subDays((int) $daysago))
            ->whereDate('date', '<=', Carbon::now())
            ->whereHas('employee', fn($query) => $query->whereDoesntHave('termination'))
            ->get();

        return ScheduleResource::collection($schedules);
    }
}
