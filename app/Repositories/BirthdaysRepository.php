<?php

namespace App\Repositories;

use App\Models\Employee;

class BirthdaysRepository
{
    protected function query()
    {
        $default_sites = config('dainsys.limit_queries.sites');

        $orderClause = env('DB_CONNECTION') === 'sqlite' ?
            'strftime("%d", date_of_birth) ASC' :
            'Day(date_of_birth) ASC';

        return Employee::query()
            ->actives()
            ->filter(request()->all())
            ->with([
                'site',
                'position' => function ($query) {
                    $query->with([
                        'department',
                        'payment_type'
                    ]);
                },
            ])
            ->forDefaultSites()
            ->orderByRaw($orderClause);
    }

    public static function today()
    {
        $static = new self();
        $date = now();

        return $static->query()
            ->whereMonth('date_of_birth', $date->month)
            ->whereDay('date_of_birth', $date->day);
    }

    public static function thisMonth()
    {
        $static = new self();
        $date = now();

        return $static->query()
            ->whereMonth('date_of_birth', $date->month);
    }

    public static function lastMonth()
    {
        $static = new self();
        $date = now()->subMonth();

        return $static->query()
            ->whereMonth('date_of_birth', $date->month);
    }

    public static function nextMonth()
    {
        $static = new self();
        $date = now()->addMonth();

        return $static->query()
            ->whereMonth('date_of_birth', $date->month);
    }
}
