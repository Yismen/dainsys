<?php

namespace App\Http\Controllers\Api\Dashboards;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\EmployeeRepository;
use App\Repositories\AttritionRepository;

/**
 * @group Dashboards
 */
class HumanResourcesController extends Controller
{
    /**
     * Dashboards Human Resources Head Counts
     *
     * Head Counts data for human resources dashboard
     *
     * @queryParam site string Limit results to specific site. Example ?site=%Santiago%
     * @queryParam project string Limit results to specific project. Example ?project=%Pub%
     * @queryParam department string Limit results to specific department. Example ?department=%Product%
     * @queryParam position string Limit results to specific position. Example ?position=%Agente%
     * @response 200 {
     *   "head_count": 75,
     *   "attrition_mtd": 1.33,
     *   "hired_tm": 5,
     *   "terminated_tm": 7,
     * }
     */
    public function head_counts()
    {
        return [
            'head_count' => EmployeeRepository::actives()->count(),
            'attrition_mtd' => AttritionRepository::mtd(),
            'hired_tm' => AttritionRepository::hiredThisMonth(),
            'terminated_tm' => AttritionRepository::terminatedThisMonth(),
        ];
    }

    /**
     * Dashboards Human Resources Head Counts by Projects
     *
     * Collection of head counts grouped by projects for human resources dashboard
     *
     * @queryParam site string Limit results to specific site. Example ?site=%Santiago%
     * @queryParam project string Limit results to specific project. Example ?project=%Pub%
     * @queryParam department string Limit results to specific department. Example ?department=%Product%
     * @queryParam position string Limit results to specific position. Example ?position=%Agente%
     * @response 200 [
     *   {
     *     "id": 13,
     *     "name": "Vincenzo Rolfson IV",
     *     "client_id": 1,
     *     "created_at": "2021-11-19T16:49:20.000000Z",
     *     "updated_at": "2021-11-19T16:49:20.000000Z",
     *     "employees_count": 1
     * }
     *]
     */
    public function hc_by_project(Request $request)
    {
        return  EmployeeRepository::byProject();
    }

    /**
     * Dashboards Human Resources Head Counts by Gender
     *
     * Collection of head count data grouped by gender for human resources dashboard
     *
     * @queryParam site string Limit results to specific site. Example ?site=%Santiago%
     * @queryParam project string Limit results to specific project. Example ?project=%Pub%
     * @queryParam department string Limit results to specific department. Example ?department=%Product%
     * @queryParam position string Limit results to specific position. Example ?position=%Agente%
     * @response 200 [
     *     {
     *        "id": 3,
     *        "name": "Male",
     *        "created_at": "2021-11-19T16:49:21.000000Z",
     *        "updated_at": "2021-11-19T16:49:21.000000Z",
     *        "employees_count": 1
     *     }
     * ]
     */
    public function hc_by_gender(Request $request)
    {
        return  EmployeeRepository::byGender();
    }

    /**
     * Dashboards Human Resources Head Counts by Departments
     *
     * Collection of head count data grouped by department for human resources dashboard
     *
     * @queryParam site string Limit results to specific site. Example ?site=%Santiago%
     * @queryParam project string Limit results to specific project. Example ?project=%Pub%
     * @queryParam department string Limit results to specific department. Example ?department=%Product%
     * @queryParam position string Limit results to specific position. Example ?position=%Agente%
     * @response 200 [
     *  {
     *      "id": 5,
     *      "name": "Luis McClure",
     *      "created_at": "2021-11-19T16:49:18.000000Z",
     *      "updated_at": "2021-11-19T16:49:18.000000Z",
     *      "employees_count": 1
     *  }
     * ]
     */
    public function hc_by_department(Request $request)
    {
        return  EmployeeRepository::byDepartment();
    }

    /**
     * Dashboards Human Resources Month Attritions
     *
     * Collection of attritions by months, including the last 12 months for human resources dashboard
     *
     * @queryParam site string Limit results to specific site. Example ?site=%Santiago%
     * @queryParam project string Limit results to specific project. Example ?project=%Pub%
     * @queryParam department string Limit results to specific department. Example ?department=%Product%
     * @queryParam position string Limit results to specific position. Example ?position=%Agente%
     * @response 200 [
     *   {
     *       "month": "2021-01",
     *       "head_count": 10,
     *       "terminations": 0,
     *       "attrition": "0.00"
     *   },
     *   {
     *       "month": "2021-02",
     *       "head_count": 10,
     *       "terminations": 0,
     *       "attrition": "0.00"
     *    }
     *]
     */
    public function attritions(Request $request)
    {
        $monthly_attrition = collect(AttritionRepository::monthly());

        return $monthly_attrition;
    }
}
