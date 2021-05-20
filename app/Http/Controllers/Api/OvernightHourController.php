<?php

namespace App\Http\Controllers\Api;

use App\OvernightHour;
use App\Http\Controllers\Controller;
use App\Http\Requests\Request;
use App\Http\Resources\OvernightHourResource;

class OvernightHourController extends Controller
{
    public function index()
    {
        $overnights = OvernightHour::query()
            ->filter(request()->all()) // date=date||months=0||days=0
            ->with(['employee'])
            ->get();

        return OvernightHourResource::collection($overnights);
    }
}
