<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Recipient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ReportsController extends Controller
{
    public function __construct()
    {
        $this->middleware('authorize:view-reports|edit-reports|create-reports', ['only' => ['index', 'show']]);
        $this->middleware('authorize:edit-reports', ['only' => ['edit', 'update']]);
        $this->middleware('authorize:create-reports', ['only' => ['create', 'store']]);
        $this->middleware('authorize:destroy-reports', ['only' => ['destroy']]);
    }

    public function index()
    {
        $reports = Report::query()
            ->orderBy('name')
            ->withCount('recipients')
            ->paginate(10);

        return view('reports.index', compact('reports'));
    }

    public function create()
    {
        $recipients = Recipient::query()->orderBy('name')->get(['name', 'id']);

        return view('reports.create')->with([
            'recipients' => $recipients
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:reports',
            'key' => 'required|unique:reports',
            'active' => 'sometimes|boolean'
        ]);

        $report = Report::create($request->only(['name', 'key', 'active', 'description']));

        $report->recipients()->sync(request('recipients'));

        Cache::forget('reports');

        return redirect()->route('admin.reports.index')
            ->withSuccess('Report ' . $report->name . ' has been created!');
    }

    public function show(Report $report)
    {
        return view('reports.show', compact('report'));
    }

    public function edit(Report $report)
    {
        $recipients = Recipient::query()->orderBy('name')->get(['name', 'id']);

        return view('reports.edit', compact('report', 'recipients'));
    }

    public function update(Report $report, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:reports,name,' . $report->id,
            'key' => 'required|unique:reports,key,' . $report->id,
            'active' => 'sometimes|boolean'
        ]);

        if (!request('active')) {
            request()->merge(['active' => false]);
        }

        $report->update($request->only(['name', 'key', 'active', 'description']));

        $report->recipients()->sync(request('recipients'));

        Cache::forget('reports');

        return redirect()->route('admin.reports.index')
            ->withSuccess('Report ' . $report->name . ' has been updated!');
    }
}
