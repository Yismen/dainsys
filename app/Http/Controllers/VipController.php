<?php

namespace App\Http\Controllers;

class VipController extends Controller
{
    public function __construct()
    {
        $this->middleware('authorize:view-vips|edit-vips|create-vips', ['only' => ['index', 'show']]);
        $this->middleware('authorize:edit-vips', ['only' => ['edit', 'update']]);
        $this->middleware('authorize:create-vips', ['only' => ['create', 'store']]);
        $this->middleware('authorize:destroy-vips', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vips.index');
    }
}
