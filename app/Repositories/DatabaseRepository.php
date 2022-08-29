<?php

namespace App\Repositories;

use App\Models\Recipient;
use Illuminate\Database\Eloquent\Builder;

class DatabaseRepository
{
    public function get(string $key, $default = null): array
    {
        $contacts = Recipient::query()
        ->whereHas('reports', function (Builder $report) use ($key) {
            $report->where('key', $key);
        })
            ->get()->pluck('email', 'name')->toArray();

        return $contacts;
    }
}
