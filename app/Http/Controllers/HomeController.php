<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }
}
