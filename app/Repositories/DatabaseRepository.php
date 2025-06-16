<?php

namespace App\Repositories;

use App\Models\Recipient;
use Illuminate\Database\Eloquent\Builder;

class DatabaseRepository
{
    public function get(string $key, $default = null): array
    {
        return Recipient::query()
            ->whereHas('reports', function (Builder $report) use ($key): void {
                $report->where('key', $key);
            })
            ->get()->pluck('email', 'name')->toArray();
    }
}
