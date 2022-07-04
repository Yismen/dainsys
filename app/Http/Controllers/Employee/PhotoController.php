<?php

namespace App\Http\Controllers\Employee;

use App\Models\Employee;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Repositories\ImageMaker;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
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

        return $employee->loadLists();
    }

    public function destroy(Employee $employee)
    {
        $path = Str::replaceFirst('storage/', '', $employee->photo);

        Storage::drive('public')->delete($path);

        $employee->update(['photo' => '']);

        Cache::forget('employees');

        return $employee->loadLists();
    }
}
