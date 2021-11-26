<?php

namespace App\Http\Controllers\Api;

use App\Bank;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BankResource;
use Carbon\Carbon;

class BanksController extends Controller
{
    public function store()
    {
        $this->validate(request(), [
            'name' => 'required'
        ]);

        $afp = Bank::create(request()->all());

        return response()->json($afp, 201);
    }
}
