<?php

namespace App\Http\Controllers\Api;

use App\PaymentFrequency;
use App\Http\Controllers\Controller;

class PaymentFrequenciesController extends Controller
{
    /**
     * Store Payment Frequencies
     *
     * Save a Payment Frequency model to database.
     *
     * @bodyParam name string required The name of the Payment Frequency
     * @response 201 {
     *      "name": "Asdfasdf",
     *      "updated_at": "2021-12-01T19:05:29.000000Z",
     *      "created_at": "2021-12-01T19:05:29.000000Z",
     *      "id": 12
     *  }
     */
    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
        ]);

        $afp = PaymentFrequency::create(request()->all());

        return response()->json($afp, 201);
    }
}
