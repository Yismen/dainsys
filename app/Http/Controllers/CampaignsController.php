<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Yajra\DataTables\DataTables;

class CampaignsController extends Controller
{
    public function __construct()
    {
        $this->middleware('authorize:view-campaigns|edit-campaigns|create-campaigns', ['only' => ['index', 'show']]);
        $this->middleware('authorize:edit-campaigns', ['only' => ['edit', 'update']]);
        $this->middleware('authorize:create-campaigns', ['only' => ['create', 'store']]);
        $this->middleware('authorize:destroy-campaigns', ['only' => ['destroy']]);
    }

    public function index()
    {
        if (! request()->ajax()) {
            return view('campaigns.index');
        }

        return DataTables::of(
            Campaign::with(['project', 'source', 'revenueType'])
        )
            ->toJson(true);
    }

    public function create()
    {
        $campaign = (new Campaign)->append([
            'project_list',
            'revenue_type_list',
        ]);

        return view('campaigns.create', compact('campaign'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:campaigns',
            'project_id' => 'required|exists:projects,id',
            'source_id' => 'required|exists:sources,id',
            'revenue_type_id' => 'required|exists:revenue_types,id',
            'sph_goal' => 'required|numeric',
            'revenue_rate' => 'required|numeric',
        ]);

        $campaign = Campaign::create($request->only(['name', 'project_id', 'source_id', 'revenue_type_id', 'sph_goal', 'revenue_rate']));

        return redirect()->route('admin.campaigns.index')
            ->withSuccess('Campaign '.$campaign->name.' has been created!');
    }

    public function show(Campaign $campaign)
    {
        return view('campaigns.show', compact('campaign'));
    }

    public function edit(Campaign $campaign)
    {
        $campaign->append([
            'project_list',
            'revenue_type_list',
        ]);

        return view('campaigns.edit', compact('campaign'));
    }

    public function update(Campaign $campaign, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:campaigns,name,'.$campaign->id,
            'project_id' => 'required|exists:projects,id',
            'source_id' => 'required|exists:sources,id',
            'revenue_type_id' => 'required|exists:revenue_types,id',
            'sph_goal' => 'required|numeric',
            'revenue_rate' => 'required|numeric',
        ]);

        // return $request->all();
        $campaign->update($request->only(['name', 'project_id', 'source_id', 'revenue_type_id', 'sph_goal', 'revenue_rate']));

        Cache::forget('campaigns');

        return redirect()->route('admin.campaigns.index')
            ->withSuccess('Campaign '.$campaign->name.' has been updated!');
    }
}
