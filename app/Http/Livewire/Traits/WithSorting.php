<?php

namespace App\Http\Livewire\Traits;

trait WithSorting
{
    public $orderBy;
    public bool $orderDirection = true;

    public function orderBy($field)
    {
        $this->orderDirection = $this->orderBy === $field ? ! $this->orderDirection : true;
        $this->orderBy = $field;
    }
}
