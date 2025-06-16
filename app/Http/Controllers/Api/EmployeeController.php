<?php

namespace App\Http\Controllers\Api;

use App\Models\Employee;
use App\Http\Controllers\Controller;
use App\Http\Resources\EmployeesResource;

class EmployeeController extends Controller
{
    /**
     * Employees All
     *
     * Collection of employees registered.
     *
     * @queryParam site string Limit results to specific site. Example ?site=%Santiago%
     * @queryParam project string Limit results to specific project. Example ?project=%Pub%
     * @queryParam department string Limit results to specific department. Example ?department=%Product%
     * @queryParam position string Limit results to specific position. Example ?position=%Agente%
     *
     * @response 200 {
     *      "data": [
     *          {
     *              "id": 10006,
     *              "first_name": "August",
     *              "second_first_name": "Nicklaus",
     *              "last_name": "Schaefer",
     *              "second_last_name": "Wuckert",
     *              "full_name": "August Nicklaus Schaefer Wuckert",
     *              "hire_date": "1990-08-30",
     *              "personal_id": "40546748566",
     *              "passport": null,
     *              "date_of_birth": "1996-10-15",
     *              "cellphone_number": "8095607690",
     *              "secondary_phone": null,
     *              "site": "Prof. Quincy Lockman DVM",
     *              "project": "Gustave Homenick",
     *              "position": "Dr. Arlo Walter Dds",
     *              "salary": 125,
     *              "salary_type": "Kaylah Ratke",
     *              "pay_per_hours": 125,
     *              "department": "Malachi Feeney I",
     *              "supervisor": "Yismen Jorge",
     *              "gender": "Ms. Kamille Hagenes MD",
     *              "marital": "Miss Brenda Will",
     *              "ars": "Adan Friesen",
     *              "afp": "Devonte Goyette DDS",
     *              "nationality": "Guam_662326",
     *              "has_kids": 0,
     *              "photo": "storage/images/employees/10006.png",
     *              "active": true,
     *              "status": "Active",
     *              "punch": null,
     *              "account_number": null,
     *              "is_vip": true,
     *              "is_universal": false,
     *              "termination_date": null
     *          }
     *      ]
     *  }
     */
    public function index()
    {
        $employees = $this->query()
            ->get();

        return EmployeesResource::collection($employees);
    }

    /**
     * Employees Recents
     *
     * Collection of recent employees. Recents are all active imployees plus any inactive employee with a termination date greater than 30 days ago.
     *
     * @queryParam site string Limit results to specific site. Example ?site=%Santiago%
     * @queryParam project string Limit results to specific project. Example ?project=%Pub%
     * @queryParam department string Limit results to specific department. Example ?department=%Product%
     * @queryParam position string Limit results to specific position. Example ?position=%Agente%
     *
     * @response 200 {
     *      "data": [
     *          {
     *              "id": 10006,
     *              "first_name": "August",
     *              "second_first_name": "Nicklaus",
     *              "last_name": "Schaefer",
     *              "second_last_name": "Wuckert",
     *              "full_name": "August Nicklaus Schaefer Wuckert",
     *              "hire_date": "1990-08-30",
     *              "personal_id": "40546748566",
     *              "passport": null,
     *              "date_of_birth": "1996-10-15",
     *              "cellphone_number": "8095607690",
     *              "secondary_phone": null,
     *              "site": "Prof. Quincy Lockman DVM",
     *              "project": "Gustave Homenick",
     *              "position": "Dr. Arlo Walter Dds",
     *              "salary": 125,
     *              "salary_type": "Kaylah Ratke",
     *              "pay_per_hours": 125,
     *              "department": "Malachi Feeney I",
     *              "supervisor": "Yismen Jorge",
     *              "gender": "Ms. Kamille Hagenes MD",
     *              "marital": "Miss Brenda Will",
     *              "ars": "Adan Friesen",
     *              "afp": "Devonte Goyette DDS",
     *              "nationality": "Guam_662326",
     *              "has_kids": 0,
     *              "photo": "storage/images/employees/10006.png",
     *              "active": true,
     *              "status": "Active",
     *              "punch": null,
     *              "account_number": null,
     *              "is_vip": true,
     *              "is_universal": false,
     *              "termination_date": null
     *          }
     *      ]
     *  }
     */
    public function recents()
    {
        $employees = $this->query()
            ->recents()
            ->get();

        return EmployeesResource::collection($employees);
    }

    /**
     * Employees Actives
     *
     * Collection of employees actives. This is any employee without a termination.
     *
     * @queryParam site string Limit results to specific site. Example ?site=%Santiago%
     * @queryParam project string Limit results to specific project. Example ?project=%Pub%
     * @queryParam department string Limit results to specific department. Example ?department=%Product%
     * @queryParam position string Limit results to specific position. Example ?position=%Agente%
     *
     * @response 200 {
     *      "data": [
     *          {
     *              "id": 10006,
     *              "first_name": "August",
     *              "second_first_name": "Nicklaus",
     *              "last_name": "Schaefer",
     *              "second_last_name": "Wuckert",
     *              "full_name": "August Nicklaus Schaefer Wuckert",
     *              "hire_date": "1990-08-30",
     *              "personal_id": "40546748566",
     *              "passport": null,
     *              "date_of_birth": "1996-10-15",
     *              "cellphone_number": "8095607690",
     *              "secondary_phone": null,
     *              "site": "Prof. Quincy Lockman DVM",
     *              "project": "Gustave Homenick",
     *              "position": "Dr. Arlo Walter Dds",
     *              "salary": 125,
     *              "salary_type": "Kaylah Ratke",
     *              "pay_per_hours": 125,
     *              "department": "Malachi Feeney I",
     *              "supervisor": "Yismen Jorge",
     *              "gender": "Ms. Kamille Hagenes MD",
     *              "marital": "Miss Brenda Will",
     *              "ars": "Adan Friesen",
     *              "afp": "Devonte Goyette DDS",
     *              "nationality": "Guam_662326",
     *              "has_kids": 0,
     *              "photo": "storage/images/employees/10006.png",
     *              "active": true,
     *              "status": "Active",
     *              "punch": null,
     *              "account_number": null,
     *              "is_vip": true,
     *              "is_universal": false,
     *              "termination_date": null
     *          }
     *      ]
     *  }
     */
    public function actives()
    {
        $employees = $this->query()
            ->actives()
            ->get();

        return EmployeesResource::collection($employees);
    }

    private function query()
    {
        return Employee::with([
            'afp',
            'ars',
            'bankAccount',
            'gender',
            'marital',
            'nationality',
            'position' => function ($query): void {
                $query->with([
                    'department',
                    'payment_type'
                ]);
            },
            'project',
            'punch',
            'site',
            'supervisor',
            'termination',
            'universal',
            'vip',
        ])
            ->sorted()
            ->filter(request()->all());
    }
}
