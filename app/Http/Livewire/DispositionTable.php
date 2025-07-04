<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Traits\WithSearch;
use App\Http\Livewire\Traits\WithSorting;
use App\Services\RingCentral\DispositionsService;
use Livewire\Component;
use Livewire\WithPagination;

class DispositionTable extends Component
{
    use WithPagination;
    use WithSearch;
    use WithSorting;

    protected $paginationTheme = 'bootstrap';

    protected $pageName = 'dispositionsPage';

    protected $listeners = [
        'dispositionsCreated' => '$refresh',
        'dispositionsUpdated' => '$refresh',

    ];

    public function render(DispositionsService $service)
    {
        return view('livewire.disposition-table', [
            'dispositions' => $service->query()
                ->when($this->orderBy, function ($query): void {
                    $query->orderBy($this->orderBy, $this->orderDirection ? 'asc' : 'desc');
                })
                ->when($this->search, function ($query): void {
                    $query->where('name', 'like', "%{$this->search}%");
                })
                ->paginate(10, ['*'], $this->pageName),
        ]);
    }
}
