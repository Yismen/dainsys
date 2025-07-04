<?php

namespace App\Http\Controllers;

use App\Models\Password;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('authorize:view-passwords|edit-passwords|create-passwords', ['only' => ['index', 'show']]);
        $this->middleware('authorize:edit-passwords', ['only' => ['edit', 'update']]);
        $this->middleware('authorize:create-passwords', ['only' => ['create', 'store']]);
        $this->middleware('authorize:destroy-passwords', ['only' => ['destroy']]);
    }

    /**
     * Main Entry poit for the API
     *
     * @return [type] [description]
     */
    public function home(Password $passwords)
    {
        // $passwords = $passwords->forCurrenUser()->get();
        // return view('passwords.index', compact('passwords'));
        return view('passwords.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Password $passwords, Request $request)
    {
        $passwords = $passwords
            // ->forCurrentUser()
            ->orderBy('title')
            ->get();

        if ($request->ajax()) {
            return $passwords;
        }

        return view('passwords.index', compact('passwords'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {}

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {}
}
