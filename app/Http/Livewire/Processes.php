<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Traits\HasLivewirePagination;
use App\Models\Process;
use Livewire\Component;

class Processes extends Component
{
    use HasLivewirePagination;

    protected $listeners = ['searchUpdated', 'processSaved' => '$refresh'];

    protected $search = null;

    public function render()
    {
        return view('livewire.processes', [
            'processes' => Process::query()
                ->when(
                    $this->search,
                    function ($query): void {
                        $this->resetPage();

                        $query->where(function ($query): void {
                            $query->where('name', 'like', "%{$this->search}%")
                                ->orWhere('description', 'like', "%{$this->search}%");
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
