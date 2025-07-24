<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Traits\HasLivewirePagination;
use App\Models\Process;
use Livewire\Component;

class Processes extends Component
{
    use HasLivewirePagination;
    use \App\Traits\Livewire\HasLivewireSearch;

    protected $listeners = ['processSaved' => '$refresh'];

    public function render()
    {
        return view('livewire.processes', [
            'processes' => Process::query()
                ->when(
                    $this->search,
                    function ($query): void {

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
}
