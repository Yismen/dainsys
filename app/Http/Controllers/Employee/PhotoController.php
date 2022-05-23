<?php

namespace App\Http\Controllers\Employee;

use Illuminate\Support\Facades\Cache;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Repositories\ImageMaker;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function update(Employee $employee, Request $request)
    {
        $this->validate($request, [
            'photo' => 'required|image|max:4000',
        ]);

        $path = "images/employees/{$employee->id}.png";

        Storage::drive('public')->put($path, ImageMaker::make($request->photo));

        $employee->update(['photo' => "storage/{$path}"]);

        Cache::forget('employees');

        return $employee;
    }
}
