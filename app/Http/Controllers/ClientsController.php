<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ClientsController extends Controller
{
    public function __construct()
    {
        $this->middleware('authorize:view-clients|edit-clients|create-clients', ['only' => ['index', 'show']]);
        $this->middleware('authorize:edit-clients', ['only' => ['edit', 'update']]);
        $this->middleware('authorize:create-clients', ['only' => ['create', 'store']]);
        $this->middleware('authorize:destroy-clients', ['only' => ['destroy']]);
    }

    public function index()
    {
        $clients = Cache::remember('clients', now()->addHours(4), fn () => Client::with('projects')->orderBy('name')->get());

        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:clients',
            'contact_name' => 'required',
            'main_phone' => 'required',
            'email' => 'required|email',
        ]);

        $client = Client::create($request->only(['name', 'contact_name', 'main_phone', 'email', 'secondary_phone', 'account_number']));

        Cache::forget('clients');

        return redirect()->route('admin.clients.index')
            ->withSuccess('Client '.$client->name.' has been created!');
    }

    public function show(Client $client)
    {
        return view('clients.show', compact('client'));
    }

    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    public function update(Client $client, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:clients,name,'.$client->id,
            'contact_name' => 'required',
            'main_phone' => 'required',
            'email' => 'required|email',
        ]);

        $client->update($request->only(['name', 'contact_name', 'main_phone', 'email', 'secondary_phone', 'account_number']));

        Cache::forget('clients');

        return redirect()->route('admin.clients.index')
            ->withSuccess('Client '.$client->name.' has been updated!');
    }
}
