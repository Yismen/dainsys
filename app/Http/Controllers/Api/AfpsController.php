<?php

namespace App\Http\Controllers\Api;

use App\Afp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AfpResource;
use Carbon\Carbon;

class AfpsController extends Controller
{
    public function store()
    {
        $this->validate(request(), [
            'name' => 'required'
        ]);

        $afp = Afp::create(request()->all());

        return response()->json($afp, 201);
    }
}
