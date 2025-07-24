<?php

namespace App\Traits\Livewire;

trait HasLivewireSearch
{
    public $search = null;

    public function getListeners()
    {
        return array_merge(parent::getListeners(), [
            'searchUpdated' => 'updateSearchAttribute',
        ]);
    }

    public function getQueryString()
    {
        return [
            'page' => ['except' => 1],
            'search' => ['except' => ''],
        ];

    }

    public function updateSearchAttribute($search)
    {
        $this->resetPage();

        $this->search = $search;
    }

}
