<?php

namespace App\Http\Controllers;

use App\Models\Recipient;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class RecipientsController extends Controller
{
    public function __construct()
    {
        $this->middleware('authorize:view-recipients|edit-recipients|create-recipients', ['only' => ['index', 'show']]);
        $this->middleware('authorize:edit-recipients', ['only' => ['edit', 'update']]);
        $this->middleware('authorize:create-recipients', ['only' => ['create', 'store']]);
        $this->middleware('authorize:destroy-recipients', ['only' => ['destroy']]);
    }

    public function index()
    {
        $recipients = Recipient::query()
            ->orderBy('name')
            ->withCount('reports')
            ->paginate(10);

        return view('recipients.index', compact('recipients'));
    }

    public function create()
    {
        $reports = Report::query()->orderBy('name')->get(['name', 'id']);

        return view('recipients.create')->with([
            'reports' => $reports,
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:recipients',
            'email' => 'required|email|unique:recipients',
            'title' => 'nullable|min:3',
        ]);

        $recipient = Recipient::create($request->only(['name', 'email', 'title']));

        $recipient->reports()->sync(request('reports'));

        Cache::forget('recipients');

        return redirect()->route('admin.recipients.index')
            ->withSuccess('Recipient '.$recipient->name.' has been created!');
    }

    public function show(Recipient $recipient)
    {
        return view('recipients.show', compact('recipient'));
    }

    public function edit(Recipient $recipient)
    {
        $reports = Report::query()->orderBy('name')->get(['name', 'id']);

        return view('recipients.edit', compact('recipient', 'reports'));
    }

    public function update(Recipient $recipient, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:recipients,name,'.$recipient->id,
            'email' => 'required|email|unique:recipients,email,'.$recipient->id,
            'title' => 'nullable|min:3',
        ]);

        $recipient->update($request->only(['name', 'email', 'title']));
        $recipient->reports()->sync(request('reports'));

        Cache::forget('recipients');

        return redirect()->route('admin.recipients.index')
            ->withSuccess('Recipient '.$recipient->name.' has been updated!');
    }

    protected function destroy(Recipient $recipient)
    {
        Cache::forget('recipients');

        $recipient->delete();

        return redirect()->route('admin.recipients.index')
            ->withDanger('Recipient '.$recipient->name.' has been removed!');
    }
}
