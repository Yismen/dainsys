<?php

namespace App\Http\Controllers\Api;

use App\Supervisor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SupervisorResource;
use Carbon\Carbon;

class SupervisorsController extends Controller
{
    public function store()
    {
        $this->validate(request(), [
            'name' => 'required'
        ]);

        $supervisor = Supervisor::create(request()->all());

        return response()->json($supervisor, 201);
    }
}
