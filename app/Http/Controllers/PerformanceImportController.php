<?php

namespace App\Http\Controllers;

use App\Models\Performance;
use App\Services\PerformancesImportService;
use Yajra\DataTables\Facades\DataTables;

class PerformanceImportController extends Controller
{
    protected $imported_files = [];

    /**
     * Protect the controller agaist unauthorized users.
     */
    public function __construct()
    {
        $this->middleware('authorize:view-performances-import', ['only' => ['index', 'show']]);
        $this->middleware('authorize:edit-performances-import', ['only' => ['edit', 'update']]);
        $this->middleware('authorize:create-performances-import', ['only' => ['create', 'store']]);
        $this->middleware('authorize:destroy-performances-import', ['only' => ['destroy', 'confirmDestroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! request()->ajax()) {
            return view('performances_import.index');
        }

        return DataTables::of(
            Performance::orderBy('date', 'DESC')
                ->with(['campaign.project'])
                ->groupBy(['date', 'file_name'])
        )
            ->toJson(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(PerformancesImportService $service)
    {
        $this->validate(request(), [
            'excel_file' => 'required',
            'excel_file.*' => 'file|mimes:csv,txt',
        ]);

        return $service->import();
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($perf_date)
    {
        if (! request()->ajax()) {
            return view('performances_import.show')->with(['date' => $perf_date]);
        }

        $performances = Performance::where('date', $perf_date)
            ->with('campaign.project')
            ->with('supervisor')
            ->with('employee.supervisor');

        return DataTables::of($performances)
            ->addColumn('edit', function ($query) {
                return route('admin.performances.edit', $query->id);
            })
            ->toJson(true);
    }

    public function confirmDestroy()
    {
        $date = request('date');
        $file_name = request('file_name');

        return view('performances_import.confirm-destroy', compact('date', 'file_name'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Performance $performance
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $has_file_name = request('file_name') && request('file_name') !== 'null';

        $performances = Performance::query()
            ->where('date', request('date'))
            ->when($has_file_name, function ($query) {
                $query->where('file_name', request('file_name'));
            }, function ($query) {
                $query->whereNull('file_name');
            })
            ->get();

        $performances->each->delete();

        return ['status' => 'sucess', 'message' => 'Performances Deleted', 'data' => $performances];
    }
}
