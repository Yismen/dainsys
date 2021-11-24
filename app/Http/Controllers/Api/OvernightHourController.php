<?php

namespace App\Http\Controllers\Api;

use App\OvernightHour;
use App\Http\Controllers\Controller;
use App\Http\Resources\OvernightHourResource;

class OvernightHourController extends Controller
{
    /**
     * Returns a collection of all the overnight hours
     * 
     * @queryParam date string Limit the results ot a specific date. Example ?date=2021-11-24. 
     * @queryParam months int Defines how many months back should the data limited to. Example ?months=2 will get data between current date and last two months. 
     * @queryParam days int Defines how many days back should the data limited to. Example ?days=2 will get data between current date and last two days. 
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function index()
    {
        $overnights = OvernightHour::query()
            ->filter(request()->all()) // date=date||months=0||days=0
            ->with(['employee'])
            ->get();

        return OvernightHourResource::collection($overnights);
    }
}
