<?php

namespace App\Http\Controllers\Api\Performances;

use App\Employee;
use App\Http\Controllers\Controller;
use App\Http\Resources\EmployeeResource;

/**
 * @group Performances
 */
class EmployeesController extends Controller
{

    /**
     * Performances Employees
     * 
     * Collection of employees formated for downtimes
     * 
     * @queryParam site string Limit results to specific site. Example ?site=%Santiago%
     * @queryParam project string Limit results to specific project. Example ?project=%Santiago%
     * @queryParam department string Limit results to specific department. Example ?department=%Santiago%
     * @queryParam position string Limit results to specific position. Example ?position=%Santiago%
     * 
     * @response 200 {
     *      "data": [
     *          {
     *             "id": 10011,
     *             "full_name": "Charley Gregory Considine Balistreri",
     *             "supervisor_id": 12,
     *             "site_id": 13,
     *             "punch": "00005"
     *         }
     *      ]
     *  }
     */
    public function __invoke()
    {
        $projects = Employee::with('supervisor')
            ->orderBy('first_name')
            ->orderBy('second_first_name')
            ->orderBy('last_name')
            ->orderBy('second_last_name')
            ->recents()
            ->get();

        return EmployeeResource::collection($projects);
    }
}
