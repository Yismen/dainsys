<?php

namespace App\Http\Controllers\Api;

use App\Ars;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ArsResource;
use Carbon\Carbon;

class ArssController extends Controller
{
    public function store()
    {
        $this->validate(request(), [
            'name' => 'required'
        ]);

        $afp = Ars::create(request()->all());

        return response()->json($afp, 201);
    }
}
