<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Traits\HasLivewirePagination;
use App\Models\Report;
use Livewire\Component;

class Reports extends Component
{
    use HasLivewirePagination;

    protected $listeners = ['searchUpdated', 'reportSaved' => '$refresh'];

    protected $search = null;

    public function render()
    {
        return view('livewire.reports', [
            'reports' => Report::query()
                ->withCount('recipients')
                ->when(
                    $this->search,
                    function ($query): void {
                        $this->resetPage();

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

    public function searchUpdated($search)
    {
        $this->search = $search;
    }
}
