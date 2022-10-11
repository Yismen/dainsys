<?php

namespace App\Services\RingCentral\Tables;

use Exception;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

/**
 * @method mixed addField()    Push new item to the default fields array
 * @method mixed datesBetwee() Update the query dates range
 * @method mixed team()        limit to certain team pattern. Default is '%'. Example 'ecc%'
 * @method mixed dialGroup()   limit to certain Dial Group pattern. Default is '%'. Example 'pol%'
 */
abstract class AbstractRingCentralService
{
    protected array $fields;
    protected Carbon $from;
    protected Carbon $to;
    protected string $team = '%';
    protected string $dial_group = '%';

    protected array $default_fields;

    public function __construct()
    {
        $this->default_fields = $this->defaultFields();

        $this->from = now();
        $this->to = now();
    }

    abstract protected function aggregates(): string;

    abstract protected function defaultFields(): array;

    abstract public function make(array $fields): Builder;

    public function addField(string $key): self
    {
        $this->default_fields[] = $key;

        return $this;
    }

    public function datesBetween(string $from, string $to = null): self
    {
        $this->from = Carbon::parse($from);
        $this->to = $to ? Carbon::parse($to) : $this->from;

        return $this;
    }

    public function team(string $team = null): self
    {
        $this->team = $team ? $team : '%';

        return $this;
    }

    public function dialGroup(string $dial_group = null): self
    {
        $this->dial_group = $dial_group ? $dial_group : '%';

        return $this;
    }

    protected function build(array $fields = [], $model)
    {
        $this->protectAgainstInvalidField($fields)
        ->updateFields($fields);

        $query = $model->query()
            ->whereDate('date', '>=', $this->from->format('Y-m-d'))
            ->whereDate('date', '<=', $this->to->format('Y-m-d'))
            // ->where('Team', 'like', $this->team)
            // ->where('Dial Group', 'like', $this->dial_group)
            ->groupByRaw(join(', ', array_values($this->fields)))
        ;

        foreach ($this->fields as $value) {
            $query->selectRaw("{$value}");
            $query->orderByRaw($value);
        }

        return $query
            ->selectRaw($this->aggregates());
    }

    protected function protectAgainstInvalidField(array $fields): self
    {
        foreach ($fields as $value) {
            if (!in_array($value, array_keys($this->default_fields))) {
                throw new Exception("Field {$value} is not included in default fields. Please remove or pass it with the ->addField('key', 'value') method!", 403);
            }
        }

        return $this;
    }

    protected function updateFields(array $fields): self
    {
        $this->fields = empty($fields) ?
            $this->default_fields :
            array_intersect($this->default_fields, $fields);

        return $this;
    }
}
