<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ARSController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function assign(Employee $employee, Request $request)
    {
        $this->validate($request, [
            'ars_id' => 'required|exists:arss,id',
        ]);

        Cache::forget('employees');
        Cache::forget('arss');

        $employee->update($request->only(['ars_id']));

        return $employee->loadLists();
    }
}
