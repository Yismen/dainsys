<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Traits\HasLivewirePagination;
use App\Models\Process;
use App\Models\Step;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class Steps extends Component
{
    use HasLivewirePagination;
    public int $process_id = 0;

    protected $listeners = ['searchUpdated', 'stepSaved' => '$refresh'];
    protected $search = null;

    public function render()
    {
        return view('livewire.steps', [
            'processes' => Cache::rememberForever('steps_processes', function () {
                return Process::orderBy('name')->get(['name', 'id']);
            }),
            'steps' => $this->process_id === 0 ? null : $this->getSteps(),
        ]);
    }

    public function searchUpdated($search)
    {
        $this->search = $search;
    }

    protected function getSteps()
    {
        return Step::query()
            ->with(['process'])
            ->when($this->process_id > 0, function ($query) {
                $query->whereHas('process', function ($query) {
                    return $query->where('id', '=', $this->process_id);
                });
            })
            ->when(
                $this->search,
                function ($query) {
                    $this->resetPage();

                    $query->where(function ($query) {
                        $query->where('name', 'like', "%{$this->search}%")
                            ->orWhere('description', 'like', "%{$this->search}%");
                    });
                }
            )
            ->orderBy('order')
            ->orderBy('name')
            ->paginate($this->amount);
    }
}
