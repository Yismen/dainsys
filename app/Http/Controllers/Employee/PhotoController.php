<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Repositories\ImageMaker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PhotoController extends Controller
{
    public function update(Employee $employee, Request $request)
    {
        $this->validate($request, [
            'photo' => 'required|image|max:4000',
        ]);

        $path = "images/employees/{$employee->id}.png";

        Storage::drive('public')->put($path, ImageMaker::make($request->photo, $squared = true));

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
