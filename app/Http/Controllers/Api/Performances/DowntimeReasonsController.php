<?php

namespace App\Http\Controllers\Api\Performances;

use App\Employee;
use App\DowntimeReason;
use App\Http\Controllers\Controller;
use App\Http\Resources\EmployeeResource;
use App\Http\Resources\DowntimeReasonsResource;

class DowntimeReasonsController extends Controller
{
    public function __invoke()
    {
        $downtime_reasons = DowntimeReason::get();

        return DowntimeReasonsResource::collection($downtime_reasons);
    }
}
