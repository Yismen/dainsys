<?php

namespace App\Http\Controllers\Api\Dashboards;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\AttritionRepository;
use App\Repositories\DepartmentRepository;
use App\Repositories\EmployeeRepository;
use App\Repositories\ProjectRepository;
use App\Repositories\SiteRepository;

class HumanResourcesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function head_counts(Request $request)
    {
        return [
            'head_count' => EmployeeRepository::actives()->count(),
            'attrition_mtd' => AttritionRepository::mtd(),
            'hired_tm' => AttritionRepository::hiredThisMonth(),
            'terminated_tm' => AttritionRepository::terminatedThisMonth(),
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function hc_by_project(Request $request)
    {
        return  EmployeeRepository::byProject();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function hc_by_gender(Request $request)
    {
        return  EmployeeRepository::byGender();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function hc_by_department(Request $request)
    {
        return  EmployeeRepository::byDepartment();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function attritions(Request $request)
    {
        $monthly_attrition = collect(AttritionRepository::monthly());

        return $monthly_attrition;
    }
}
