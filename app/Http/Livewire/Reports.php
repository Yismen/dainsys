<?php

namespace App\Http\Livewire;

use App\Models\Report;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Livewire\Traits\HasLivewirePagination;

class Reports extends Component
{
    use HasLivewirePagination;
    use AuthorizesRequests;
    use \App\Traits\Livewire\HasLivewireSearch;

    protected $listeners = ['reportSaved' => '$refresh'];

    public function render()
    {
        $this->authorize('view-reports');

        return view('livewire.reports', [
            'reports' => Report::query()
                ->withCount('recipients')
                ->when(
                    $this->search,
                    function ($query): void {
                        $query->where(function ($query): void {
                            $query->where('name', 'like', "%{$this->search}%")
                                ->orWhere('key', 'like', "%{$this->search}%");
                        });
                    }
                )
                ->orderBy('name')
                ->paginate($this->amount),
        ]);
    }
}
