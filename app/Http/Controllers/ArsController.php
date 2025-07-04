<?php

namespace App\Http\Controllers;

use App\Models\Ars;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ArsController extends Controller
{
    public function __construct()
    {
        $this->middleware('authorize:view-arss|edit-arss|create-arss', ['only' => ['index', 'show']]);
        $this->middleware('authorize:edit-arss', ['only' => ['edit', 'update']]);
        $this->middleware('authorize:create-arss', ['only' => ['create', 'store']]);
        $this->middleware('authorize:destroy-arss', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $free_employees = Employee::doesntHave('ars')
            ->actives()
            ->get();

        $arss = Cache::rememberForever('arss', fn () => Ars::with(['employees' => fn ($query) => $query
            ->orderBy('first_name')
            ->orderBy('second_first_name')
            ->orderBy('last_name')
            ->orderBy('second_last_name')
            ->actives(),
        ])->orderBy('name')->get());

        if ($request->ajax()) {
            return $arss;
        }

        return view('arss.index', compact('arss', 'free_employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('arss.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Ars $ars)
    {
        $this->validate($request, [
            'name' => 'required|min:3|unique:arss',
        ]);

        Cache::forget('employees');
        Cache::forget('arss');

        $ars = $ars->create($request->only('name'));

        if ($request->ajax()) {
            return $ars;
        }

        return redirect()->route('admin.arss.index')
            ->withSuccess("ARS {$ars->name} created!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  Ars $ars
     * @return \Illuminate\Http\Response
     */
    public function show(Ars $ars)
    {
        return view('arss.show', compact('ars'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Ars $ars
     * @return \Illuminate\Http\Response
     */
    public function edit(Ars $ars)
    {
        return view('arss.edit', compact('ars'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  Ars $ars
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ars $ars)
    {
        $this->validate($request, [
            'name' => 'required|min:3|unique:arss,name,'.$ars->id,
        ]);

        Cache::forget('employees');
        Cache::forget('arss');

        $ars->update($request->only(['name']));

        return redirect()->route('admin.arss.index')
            ->withSuccess("ARS {$ars->name} Updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Ars $ars
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ars $ars, Request $request)
    {
        Cache::forget('employees');
        Cache::forget('arss');

        if ($ars->employees->count()) {
            if ($request->ajax()) {
                return abort(403, "ARS {$ars->name} has employees therefore it can't be deleted!");
            }

            return redirect()->back()
                ->withDanger("ARS {$ars->name} has employees therefore it can't be deleted!");
        }

        $ars->delete();

        if ($request->ajax()) {
            return response($ars);
        }

        return redirect()->route('admin.arss.index')
            ->withWarning("ARS {$ars->name} have been eliminated!");
    }

    public function assignEmployees(Request $request)
    {
        $this->validate($request, [
            'employee' => 'required|array',
            'ars' => 'required|exists:arss,id',
        ], [
            'employee.required' => 'Select at least one employee!',
        ]);

        Cache::forget('employees');
        Cache::forget('arss');

        foreach ($request->employee as $id) {
            $employee = Employee::whereId($id)->first();

            $employee->update(['ars_id' => $request->ars]);
        }

        return redirect()->route('admin.arss.index')
            ->withSuccess('Done!');
    }
}
