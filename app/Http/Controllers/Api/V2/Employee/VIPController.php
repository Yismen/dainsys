<?php

namespace App\Http\Controllers\Api\V2\Employee;

use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class VIPController extends Controller
{
    /**
     * Update VIP
     *
     * Update VIP information for a given employee.
     *
     * @bodyParam is_vip boolean required Indicates if the employee should be added to or removed from the Vip list
     * @response 200 {
     *     "id": 10006,
     *     "first_name": "August",
     *     "second_first_name": "Nicklaus",
     *     "last_name": "Schaefer",
     *     "second_last_name": "Wuckert",
     *     "full_name": "August Nicklaus Schaefer Wuckert",
     *     "hire_date": "1990-08-30",
     *     "personal_id": "40546748566",
     *     "passport": null,
     *     "date_of_birth": "1996-10-15",
     *     "cellphone_number": "8095607690",
     *     "secondary_phone": null,
     *     "site": "Prof. Quincy Lockman DVM",
     *     "project": "Gustave Homenick",
     *     "position": "Dr. Arlo Walter Dds",
     *     "salary": 125,
     *     "salary_type": "Kaylah Ratke",
     *     "pay_per_hours": 125,
     *     "department": "Malachi Feeney I",
     *     "supervisor": "Yismen Jorge",
     *     "gender": "Ms. Kamille Hagenes MD",
     *     "marital": "Miss Brenda Will",
     *     "ars": "Adan Friesen",
     *     "afp": "Devonte Goyette DDS",
     *     "nationality": "Guam_662326",
     *     "has_kids": 0,
     *     "photo": "storage/images/employees/10006.png",
     *     "active": true,
     *     "status": "Active",
     *     "punch": null,
     *     "account_number": null,
     *     "is_vip": true,
     *     "is_universal": false,
     *     "termination_date": null
     *  }
     */
    public function update(Request $request, Employee $employee)
    {
        $this->validate($request, [
            'is_vip' => 'required|boolean',
        ]);

        Cache::forget('employees');

        if ($request->get('is_vip') == 1) {
            $employee->vip()->create(['since' => Carbon::now()]);
        } else {
            $employee->vip()->delete();
        }

        return $employee->load('vip');
    }
}
