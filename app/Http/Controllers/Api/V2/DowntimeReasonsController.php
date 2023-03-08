<?php

namespace App\Http\Controllers\Api\V2;

use App\Http\Controllers\Controller;
use App\Http\Resources\DowntimeReasonsResource;
use App\Models\DowntimeReason;

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
        $downtime_reasons = DowntimeReason::orderBy('get')->get();

        return DowntimeReasonsResource::collection($downtime_reasons);
    }
}
