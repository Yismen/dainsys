<?php

namespace App\Services\RingCentral\Tables;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

abstract class AbstractRingCentralService
{
    protected array $fields;
    protected Carbon $date_from;
    protected Carbon $date_to;
    protected Builder $query;

    public function __construct()
    {
        $this->date_from = now();
        $this->date_to = now();
        $this->query = $this->baseQuery();
    }

    public function datesBetween(string $date_from, ?string $to = null): self
    {
        $this->date_from = Carbon::parse($date_from);
        $this->date_to = $to ? Carbon::parse($to) : $this->date_from;

        return $this;
    }

    public function groupByDate(): self
    {
        $this->query
            ->groupBy('date')
            ->orderBy('date');

        return $this;
    }

    public function build(array $fields = [])
    {
        $this->query->whereDate('date', '>=', $this->date_from)
            ->whereDate('date', '<=', $this->date_to)
            ->addSelect('date');

        foreach ($fields as $field => $value) {
            $this->query->addSelect($field)
                ->where($field, 'like', $value)
                ->groupBy($field)
                ->orderBy($field);
        }

        return $this->query;
    }

    abstract protected function baseQuery(): Builder;
}
