<?php

namespace App\Services;

use App\Imports\PerformancesImport;
use Maatwebsite\Excel\Facades\Excel;

class PerformancesImportService
{
    public function import()
    {
        foreach (request()->file('excel_file') as $key => $file) {
            $file_name = $file->getClientOriginalName();

            if (!\Illuminate\Support\Str::contains($file_name, '_performance_daily_data_')) {
                $message = 'Wrong file selected. Please make sure you pick a file which the correct naming convention _performance_daily_data_...';
                if (request()->ajax()) {
                    return response($message, 422);
                }

                return redirect()->back()
                    ->withErrors(['excel_file' => $message]);
            }

            $this->imported_files[] = $file_name;

            Excel::import(new PerformancesImport($file_name), $file);
        }

        request()->session()->flash('imported_files', $this->imported_files);

        if (request()->ajax()) {
            return response($this->imported_files);
        }

        return redirect()->route('admin.performances_import.index');
    }
}
