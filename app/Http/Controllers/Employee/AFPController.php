<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class AFPController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int                       $id
     *
     * @return \Illuminate\Http\Response
     */
    public function assign(Request $request, Employee $employee)
    {
        $this->validate($request, [
            'afp_id' => 'required|exists:afps,id',
        ]);

        Cache::forget('employees');
        Cache::forget('afps');

        $employee->update($request->only('afp_id'));

        return $employee->loadLists();
    }
}
