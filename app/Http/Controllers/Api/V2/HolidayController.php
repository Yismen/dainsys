<?php

namespace App\Http\Controllers\Api\V2;

use App\Holiday;
use App\Http\Controllers\Controller;
use App\Http\Resources\HolidayResource;

class HolidayController extends Controller
{
    /**
     * Holidays Dates
     *
     * Collection of holidays. If year is not especified in the query string, it will return all holidays for previous year, current year and futuristic holidays.
     *
     * @queryParam year string Limit the results to a specific year. Default to previous year. Example ?year=2021.
     * @response 200 {
     *      "data": [
     *          {
     *              "date": "2021-07-04",
     *              "name": "Independence Day",
     *              "description": "Day of idenpendence in USA."
     *          }
     *      ]
     *  }
     */
    public function index()
    {
        $holidays = Holiday::query()
            ->when(
                request()->has('year'),
                function ($query) {
                    $query->whereYear('date', request('year'));
                },
                function ($query) {
                    $query->whereYear('date', '>=', now()->subYear()->year);
                }
            )
            ->get();

        return HolidayResource::collection($holidays);
    }
}
