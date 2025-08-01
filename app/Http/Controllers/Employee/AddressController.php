<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class AddressController extends Controller
{
    /**
     * update employees' address
     *
     *
     * @return void
     */
    public function update(Employee $employee, Request $request, Address $address)
    {
        $this->validate(
            $request,
            [
                'sector' => 'required|min:3',
                'street_address' => 'required|min:3',
                'city' => 'required|min:3',
            ]
        );

        Cache::forget('employees');
        Cache::forget('addresses');

        $employee->address()->updateOrCreate([], $request->only(['sector', 'street_address', 'city']));

        return $employee->loadLists();
    }
}
