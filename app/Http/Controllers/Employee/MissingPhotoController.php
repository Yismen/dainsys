<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Repositories\MissingInfoRepository;

class MissingPhotoController extends Controller
{
    public function __invoke()
    {
        $employees_missing_photo = MissingInfoRepository::photo()->get();

        return view('employees.missing_data.missing_photo', compact('employees_missing_photo'));
    }
}
