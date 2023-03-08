<?php

namespace App\Http\Controllers\Api\V2;

use App\Http\Controllers\Controller;
use App\Models\Position;
use App\Rules\PositionUnique;
use Illuminate\Http\Request;

class PositionsController extends Controller
{
    /**
     * Store Positions
     *
     * Save a Position model to database.
     *
     * @bodyParam name string required The name of the Position
     * @bodyParam department_id numeric required The department_id of the Position
     * @bodyParam payment_type_id numeric required The payment_type_id of the Position
     * @bodyParam payment_frequency_id numeric required The payment_frequency_id of the Position
     * @bodyParam salary numeric required The salary of the Position
     *
     * @response 201 {
     *      "name": "Asdfasdf",
     *      "department_id": 1,
     *      "payment_type_id": 1,
     *      "payment_frequency_id": 1,
     *      "salary": 150,
     *      "updated_at": "2021-12-01T19:18:45.000000Z",
     *      "created_at": "2021-12-01T19:18:45.000000Z",
     *      "id": 14,
     *      "name_and_department": "Administration-Asdfasdf",
     *      "pay_per_hours": 150,
     *      "department": {
     *          "id": 1,
     *          "name": "Administration",
     *          "created_at": "2021-11-19T15:09:20.000000Z",
     *          "updated_at": "2021-11-19T15:09:20.000000Z"
     *      },
     *      "payment_type": {
     *          "id": 1,
     *          "name": "By Hours",
     *          "slug": "by-hours",
     *          "created_at": "2021-11-19T15:09:42.000000Z",
     *          "updated_at": "2021-11-19T15:09:42.000000Z"
     *      }
     *  }
     */
    public function store(Position $position, Request $request)
    {
        $this->validate(request(), [
            'name' => [
                'required',
                'min:2',
                new PositionUnique($position, $request),
            ],
            'department_id' => 'required|exists:departments,id',
            'payment_type_id' => 'required|exists:payment_types,id',
            'payment_frequency_id' => 'required|exists:payment_frequencies,id',
            'salary' => 'required|numeric|min:45|max:500000',
        ]);

        $afp = Position::create(request()->all());

        return response()->json($afp, 201);
    }
}
