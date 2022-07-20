<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Termination;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Events\EmployeeCreated;
use Yajra\DataTables\DataTables;

class EmployeesController extends Controller
{
    protected $provider;
    private $request;
    private $carbon;

    public function __construct()
    {
        $this->middleware('authorize:view-employees|edit-employees|create-employees', ['only' => ['index', 'show']]);
        $this->middleware('authorize:edit-employees', ['only' => ['edit', 'update']]);
        $this->middleware('authorize:create-employees', ['only' => ['create', 'store']]);
        $this->middleware('authorize:destroy-employees', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @Get("/employees")
     *
     * @return Response
     */
    public function index()
    {
        if (!request()->ajax()) {
            return view('employees.index');
        }

        return $this->getDatatables();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Employee $employee)
    {
        $employee
            ->append([
                'genders_list',
                'maritals_list',
                'sites_list',
                'projects_list',
                'positions_list',
                'departments_list',
                'payment_types_list',
                'payment_frequencies_list',
            ]);

        return view('employees.create', compact('employee'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Employee $employee, Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'hire_date' => 'required|date',
            'personal_id' => 'required_if:passport,null|nullable|digits:11|unique:employees,personal_id|size:11',
            'passport' => 'required_if:personal_id,null|nullable|unique:employees,passport|size:10',
            'date_of_birth' => 'required|date',
            'cellphone_number' => 'required|digits:10|unique:employees,cellphone_number',
            'secondary_phone' => 'nullable|digits:10',
            'position_id' => 'required|exists:positions,id',
            'gender_id' => 'required|exists:genders,id',
            'site_id' => 'required|exists:sites,id',
            'project_id' => 'required|exists:projects,id',
            'marital_id' => 'required|exists:maritals,id',
            'has_kids' => 'required|boolean',
            'punch' => 'required|min:4|max:90|unique:punches,punch',
        ]);

        $employee = $employee->create($request->all());
        
        $employee->punch()->create($request->only(['punch']));

        EmployeeCreated::dispatch($employee);

        if ($request->ajax()) {
            return $employee
            ->append([
                'ars_list',
                'afp_list',
                'banks_list',
                'departments_list',
                'genders_list',
                'has_kids_list',
                'maritals_list',
                'positions_list',
                'projects_list',
                'payment_types_list',
                'payment_frequencies_list',
                'nationalities_list',
                'sites_list',
                'supervisors_list',
                'termination_type_list',
                'termination_reason_list',
            ]);
        }

        return redirect()->route('admin.employees.edit', $employee->id)
            ->withSuccess("Succesfully added employee [$employee->first_name $employee->last_name];");
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show(Employee $employee)
    {
        $employee->load(['changes.user', 'processes']);

        $previous_terminations = Termination::query()
        ->withTrashed()
        ->latest('updated_at')
        ->where('employee_id', $employee->id)
        ->with(['terminationReason', 'terminationType'])
        ->get();
        // dd($employee->toArray());

        return view('employees.show', compact('employee', 'previous_terminations'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit(Employee $employee)
    {
        $employee->append([
            'ars_list',
            'afp_list',
            'banks_list',
            'departments_list',
            'genders_list',
            'has_kids_list',
            'maritals_list',
            'positions_list',
            'projects_list',
            'payment_types_list',
            'payment_frequencies_list',
            'nationalities_list',
            'sites_list',
            'supervisors_list',
            'termination_type_list',
            'termination_reason_list',
        ]);

        return view('employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update(Employee $employee, Request $request)
    {
        $validated = $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'hire_date' => 'required|date',
            'personal_id' => 'required_if:passport,null|nullable|digits:11|unique:employees,personal_id,' . $employee->id,
            'passport' => 'required_if:personal_id,null|nullable|size:10|unique:employees,passport,' . $employee->id,
            'date_of_birth' => 'required|date',
            'cellphone_number' => 'required|digits:10|unique:employees,cellphone_number,' . $employee->id,
            'secondary_phone' => 'nullable|digits:10',
            'gender_id' => 'required|exists:genders,id',
            'site_id' => 'required|exists:sites,id',
            'project_id' => 'required|exists:projects,id',
            'marital_id' => 'required|exists:maritals,id',
            'has_kids' => 'required|boolean',
            'position_id' => 'required|exists:positions,id',
        ]);

        $employee->update($request->all());

        if ($request->ajax()) {
            return $employee
            ->append([
                'ars_list',
                'afp_list',
                'banks_list',
                'departments_list',
                'genders_list',
                'has_kids_list',
                'maritals_list',
                'positions_list',
                'projects_list',
                'payment_types_list',
                'payment_frequencies_list',
                'nationalities_list',
                'sites_list',
                'supervisors_list',
                'termination_type_list',
                'termination_reason_list',
            ]);
        }

        return redirect()->route('admin.employees.edit', $employee->id)
            ->withSuccess("Succesfully updated employee [$request->first_name $request->last_name]");
    }

    protected function getDatatables()
    {
        return DataTables::of(
            Employee::query()
                ->with([
                    'position.department',
                    'position.payment_type',
                    'project',
                    'termination',
                    'punch',
                    'site',
                ])
        )->filterColumn('status', function ($query, $keyword) {
            $method = $this->getScope($keyword);

            $query->$method();
        }, true)
            ->editColumn('hire_date', function ($query) {
                return $query->hire_date->format('d-M-Y');
            })
            ->editColumn('status', function ($query) {
                return $query->active ? 'Active' : 'Inactive';
            })
            ->addColumn('edit', function ($query) {
                return route('admin.employees.edit', $query->id);
            })
            ->toJson(true);
    }

    protected function getScope($keyword)
    {
        if (Str::startsWith($keyword, 'active')) {
            return 'actives';
        }

        if (Str::startsWith($keyword, 'inactive')) {
            return 'inactives';
        }

        return 'all';
    }
}
