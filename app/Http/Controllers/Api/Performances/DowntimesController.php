<?php

namespace App\Http\Controllers\Api\Performances;

use App\Employee;
use App\DowntimeReason;
use App\Http\Controllers\Controller;
use App\Http\Resources\EmployeeResource;
use App\Http\Resources\DowntimeReasonsResource;
use App\Http\Resources\DowntimesResource;
use App\Performance;
use Carbon\Carbon;

class DowntimesController extends Controller
{

    /**
     * Returns a collection of dowtimes
     * @queryParam months int Amount of months to to filter back. Default 0. Example ?months=2
     *
     * @return void
     */
    public function index()
    {
        $months = request()->months ?: 0;

        $downtimes = Performance::with('campaign.project', 'downtimeReason', 'employee')
            ->whereHas('campaign', function ($query) {
                return $query->whereHas('project', function ($query) {
                    return $query->where('name', 'like', '%downtimes%');
                })
                    ->orWhere('name', 'like', '%downtimes%');
            })
            ->orderBy('date')
            ->whereDate('date', '>=', Carbon::now()->subMonths((int)$months)->startOfMonth())
            ->get();

        return DowntimesResource::collection($downtimes);
    }

    public function employees()
    {
        $projects = Employee::with('supervisor')
            ->orderBy('first_name')
            ->orderBy('second_first_name')
            ->orderBy('last_name')
            ->orderBy('second_last_name')
            ->recents()
            ->get();

        return EmployeeResource::collection($projects);
    }
}
