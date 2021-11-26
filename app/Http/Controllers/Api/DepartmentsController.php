<?php

namespace App\Http\Controllers\Api;

use App\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DepartmentResource;
use Carbon\Carbon;

class DepartmentsController extends Controller
{
    public function store()
    {
        $this->validate(request(), [
            'name' => 'required'
        ]);

        $afp = Department::create(request()->all());

        return response()->json($afp, 201);
    }
}
