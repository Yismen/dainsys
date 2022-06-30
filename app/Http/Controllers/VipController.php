<?php

namespace App\Http\Controllers;

class VipController extends Controller
{
    public function __construct()
    {
        $this->middleware('authorize:view-vips|edit-vips|create-vips', ['only' => ['index']]);
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
