<?php

namespace App\Http\Livewire\Traits;

use Livewire\WithPagination;

trait HasLivewirePagination
{
    use WithPagination;

    protected $amount = 10;

    protected $paginationTheme = 'bootstrap';

    public function paginationView()
    {
        return 'layouts.partials.pagination';
    }
}
