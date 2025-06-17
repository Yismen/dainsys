<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ShiftsController extends Controller
{
    public function __construct()
    {
        $this->middleware('authorize:view-shifts|edit-shifts|create-shifts', ['only' => ['index', 'show']]);
        $this->middleware('authorize:edit-shifts', ['only' => ['edit', 'update']]);
        $this->middleware('authorize:create-shifts', ['only' => ['create', 'store']]);
        $this->middleware('authorize:destroy-shifts', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! request()->ajax()) {
            return view('shifts.index');
        }

        $shifts = Shift::with('employee')
            ->orderBy('slug')
            ->whereHas('employee', fn($query) => $query->actives());

        return DataTables::of($shifts)
            ->orderColumn('employee', 'slug $1')
            ->toJson(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Shift $shift)
    {
        return view('shifts.create', compact('shift'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $this->validate($request, [
            'employee_id' => 'required|unique:shifts',
            'start_at' => 'required|date_format:H:i',
            'end_at' => 'required|date_format:H:i',
            'monday' => 'nullable|numeric|min:0|max:12',
            'tuesday' => 'nullable|numeric|min:0|max:12',
            'wednesday' => 'nullable|numeric|min:0|max:12',
            'thursday' => 'nullable|numeric|min:0|max:12',
            'friday' => 'nullable|numeric|min:0|max:12',
            'saturday' => 'nullable|numeric|min:0|max:12',
            'sunday' => 'nullable|numeric|min:0|max:12',
        ]);

        $shift = Shift::create($validated);

        return redirect()->route('admin.shifts.index')
            ->withSuccess('Shift ' . $shift->name . ' created!');
    }

    /**
     * Display the specified resource.
     *
     * @param int  Shift $shift
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Shift $shift)
    {
        return view('shifts.show', compact('shift'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int  Shift $shift
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Shift $shift)
    {
        return view('shifts.edit', compact('shift'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int  Shift               $shift
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shift $shift)
    {
        $validated = $this->validate($request, [
            'employee_id' => 'required|unique:shifts,employee_id,' . $shift->id,
            'start_at' => 'required|date_format:H:i',
            'end_at' => 'required|date_format:H:i',
            'monday' => 'nullable|numeric|min:0|max:12',
            'tuesday' => 'nullable|numeric|min:0|max:12',
            'wednesday' => 'nullable|numeric|min:0|max:12',
            'thursday' => 'nullable|numeric|min:0|max:12',
            'friday' => 'nullable|numeric|min:0|max:12',
            'saturday' => 'nullable|numeric|min:0|max:12',
            'sunday' => 'nullable|numeric|min:0|max:12',
        ]);

        $shift->update($validated);

        return redirect()->route('admin.shifts.index')
            ->withSuccess('Shift ' . $shift->name . ' updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int  Shift $shift
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shift $shift)
    {
        $shift->delete();

        return redirect()->route('admin.shifts.index')
            ->withWarning("Shift {$shift->name} has been removed.");
    }
}
