<?php

namespace App\Http\Controllers\Api\Performances;

use App\Schedule;
use App\LoginName;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ScheduleResource;
use App\Http\Resources\LoginNameResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

class SchedulesController extends Controller
{

    /**
     * Retunrs a collection of employees' schedules, filtered by many days ago.
     * 
     * @queryParam daysago int. The amount of days to filter back. Default 90. Example daysago=45
     *
     * @param Request $request
     * @return \Illuminate\Support\JsonResource
     */
    public function __invoke(): JsonResource
    {
        $daysago = request()->daysago ?: 90;

        $schedules = Schedule::with(['employee.supervisor'])
            ->orderBy('employee_id')
            ->orderBy('date')
            ->whereDate('date', '>=', Carbon::now()->subDays((int) $daysago))
            ->whereDate('date', '<=', Carbon::now())
            ->whereHas('employee', function ($query) {
                return $query->whereDoesntHave('termination');
            })
            ->get();

        return ScheduleResource::collection($schedules);
    }
}
