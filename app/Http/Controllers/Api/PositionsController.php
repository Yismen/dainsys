<?php

namespace App\Http\Controllers\Api;

use App\Position;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PositionResource;
use App\Rules\PositionUnique;
use Carbon\Carbon;

class PositionsController extends Controller
{
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
