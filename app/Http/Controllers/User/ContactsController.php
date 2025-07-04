<?php

namespace App\Http\Controllers\User;

// use App\Http\Requests\SaveContactsRequest;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Contact $contacts)
    {
        $contacts = $contacts->with('user')->orderBy('name')->paginate(35);

        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Contact $contact, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'email',
        ]);

        $contact = auth()->user()->contacts()->create(
            $request->only(
                ['name', 'phone', 'works_at', 'position', 'secondary_phone', 'email']
            )
        );

        return redirect()->route('admin.contacts.index')
            ->withSuccess("Your contact {$contact->name} has been crated!");
    }

    /**
     * @parameter $contact Model
     */
    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Contact $contact, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'email',
        ]);

        $contact->update($request->only(['name', 'phone', 'works_at', 'position', 'secondary_phone', 'email']));

        return \Illuminate\Support\Facades\Redirect::route('admin.contacts.index')
            ->withSuccess("Your contact {$contact->name} has been updated succesffully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('admin.contacts.index')
            ->withDanger("Your contact {$contact->name} has been remvoved!");
    }
}
