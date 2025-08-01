<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OvernightHourResource;
use App\Models\OvernightHour;
use Illuminate\Database\Eloquent\Collection;

class OvernightHourController extends Controller
{
    /**
     * Overnight Hours
     *
     * Collection of all the overnight hours
     *
     * @queryParam date string Limit the results ot a specific date. Example ?date=2021-11-24.
     * @queryParam months int Defines how many months back should the data limited to. Example ?months=2 will get data between current date and last two months.
     * @queryParam days int Defines how many days back should the data limited to. Example ?days=2 will get data between current date and last two days.
     *
     * @response 200 {
     *     "data": [
     *         {
     *             "date": "2021-12-01",
     *             "employee_id": 10009,
     *             "name": "Clifford Odell Jerde Vandervort",
     *             "hours": 8
     *         }
     *     ]
     * }
     */
    public function index()
    {
        $overnights = OvernightHour::query()
            ->filter(request()->all()) // date=date||months=0||days=0
            ->with(['employee'])
            ->get();

        if ($overnights->isEmpty())
        {
            $overnights = new Collection([
                new OvernightHour([
                    'date' => now(),
                    'employee_id' => null,
                    'name' => '',
                    'hours' => 0,
                ])
            ]);
        }

        return OvernightHourResource::collection($overnights);
    }
}
