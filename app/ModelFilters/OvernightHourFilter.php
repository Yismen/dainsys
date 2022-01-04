<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class OvernightHourFilter extends ModelFilter
{
    /**
     * Related Models that have ModelFilters as well as the method on the ModelFilter
     * As [relationMethod => [input_key1, input_key2]].
     *
     * @var array
     */
    public $relations = [];

    /**
     * Filter by date
     *
     * @param string $request
     * @return void
     */
    public function date($request): OvernightHourFilter
    {
        return $this->whereDate('date', $request);
    }

    /**
     * Filter by date
     *
     * @param string $request
     * @return void
     */
    public function months(int $request): OvernightHourFilter
    {
        $date = now()->subMonths($request)->startOfMonth();

        return $this->whereDate('date', '>=', $date)
            ->whereDate('date', '<=', \now());
    }

    /**
     * Filter by date
     *
     * @param string $request
     * @return void
     */
    public function days(int $request): OvernightHourFilter
    {
        $date = now()->subDays($request);

        return $this->whereDate('date', '>=', $date)
            ->whereDate('date', '<=', \now());
    }
}
