<?php

namespace App\Http\Controllers;

// use App\Http\Request;
use App\Models\Position;
use App\Rules\PositionUnique;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PositionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('authorize:view-positions|edit-positions|create-positions', ['only' => ['index', 'show']]);
        $this->middleware('authorize:edit-positions', ['only' => ['edit', 'update']]);
        $this->middleware('authorize:create-positions', ['only' => ['create', 'store']]);
        $this->middleware('authorize:destroy-positions', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of(
                Position::with('department')
                    ->withCount(['employees' => fn ($query) => $query->actives(),
                    ])
                    ->with('payment_type')
                    ->with('payment_frequency')
            )
                ->toJson(true);
        }

        return view('positions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Position $position, Request $request)
    {
        if ($request->ajax()) {
            return $position;
        }

        return view('positions.create', compact('position'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Position $position, Request $request)
    {
        $this->validate($request, [
            'name' => [
                'required',
                'min:2',
                new PositionUnique($position, $request),
            ],
            'department_id' => 'required|exists:departments,id',
            'payment_type_id' => 'required|exists:payment_types,id',
            'payment_frequency_id' => 'required|exists:payment_frequencies,id',
            'salary' => 'required|numeric|min:45|max:500000',
        ]);

        $position = $position->create(
            $request->only(['name', 'department_id', 'payment_frequency_id', 'payment_type_id', 'salary'])
        );

        if ($request->ajax()) {
            return $position;
        }

        return redirect()->route('admin.positions.index')
            ->withSuccess("Position {$position->name} has been created!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Position $position)
    {
        return view('positions.show', compact('position'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Position $position, Request $request)
    {
        if ($request->ajax()) {
            return $position;
        }

        return view('positions.edit', compact('position'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Position $position, Request $request)
    {
        $this->validate($request, [
            'name' => [
                'required',
                'min:2',
                new PositionUnique($position, $request),
            ],
            'department_id' => 'required|exists:departments,id',
            'payment_type_id' => 'required|exists:payment_types,id',
            'payment_frequency_id' => 'required|exists:payment_frequencies,id',
            'salary' => 'required|numeric|min:45|max:500000',
        ]);

        $position->update($request->only(['name', 'department_id', 'payment_frequency_id', 'payment_type_id', 'salary']));

        if ($request->ajax()) {
            return $position->load('department', 'payment_frequency', 'payment_type');
        }

        return redirect()->route('admin.positions.index')
            ->withSuccess("Position {$position->name} updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Position $position, Request $request)
    {
        abort_if(
            $position->employees()->actives()->count(),
            403,
            "Position {$position->name} has active employees, therefore cannot be removed"
        );

        $position->delete();

        if ($request->ajax()) {
            return $position;
        }

        return redirect()->route('admin.positions.index')
            ->withWarning("Position {$position->name} has been removed!");
    }
}
