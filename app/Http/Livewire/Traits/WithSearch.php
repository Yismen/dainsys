<?php

namespace App\Http\Livewire\Traits;

trait WithSearch
{
    public $search;

    public function updatingSearch()
    {
        $this->resetPage($this->pageName);
    }
}
