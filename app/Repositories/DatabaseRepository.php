<?php

namespace App\Repositories;

use App\Models\Report;

class DatabaseRepository
{
    public function get(string $key, $default = null): array
    {
//         $list = Report::query()
//             ->where('key', $key)
//             ->with('contacts')
//             ->pluck('');

        // dd($list);
//         return config($key, $default);
        return [];
    }
}
