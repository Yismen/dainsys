<?php

namespace App\Http\Controllers\Api\Performances;

use App\DowntimeReason;
use App\Http\Controllers\Controller;
use App\Http\Resources\DowntimeReasonsResource;

/**
 * @group Performances
 */
class DowntimeReasonsController extends Controller
{
    /**
     * Performances Downtime Reasons
     *
     * Collection of downtime reasons
     *
     * @response 200 {
     *      "data": [
     *          {
     *              "id": 1,
     *              "name": "Falta De Trabajo"
     *          }
     *      ]
     *  }
     */
    public function __invoke()
    {
        $downtime_reasons = DowntimeReason::get();

        return DowntimeReasonsResource::collection($downtime_reasons);
    }
}
