<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Traits\WithSearch;
use App\Http\Livewire\Traits\WithSorting;
use App\Services\RingCentral\DispositionsPendingIdentificationService;
use Livewire\Component;
use Livewire\WithPagination;

class DispositionUnidentifiedTable extends Component
{
    use WithPagination;
    use WithSearch;
    use WithSorting;

    protected $paginationTheme = 'bootstrap';

    protected $pageName = 'pendingPage';

    protected $listeners = [
        'dispositionsCreated' => '$refresh',
    ];

    public function render(DispositionsPendingIdentificationService $service)
    {
        return view('livewire.disposition-unidentified-table', [
            'dispositions' => $service->query()
                ->when($this->orderBy, function ($query) {
                    $query->orderBy($this->orderBy, $this->orderDirection ? 'asc' : 'desc');
                })
                ->when($this->search, function ($query) {
                    $query->where('agent_disposition', 'like', "%{$this->search}%");
                })
                ->paginate(10, ['*'], $this->pageName),
        ]);
    }
}
