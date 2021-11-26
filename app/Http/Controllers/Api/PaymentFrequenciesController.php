<?php

namespace App\Http\Controllers\Api;

use App\PaymentFrequency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PaymentFrequencyResource;
use Carbon\Carbon;

class PaymentFrequenciesController extends Controller
{
    public function store()
    {
        $this->validate(request(), [
            'name' => 'required'
        ]);

        $afp = PaymentFrequency::create(request()->all());

        return response()->json($afp, 201);
    }
}
