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
    use \App\Traits\Livewire\HasLivewireSearch;

    public int $process_id = 0;

    protected $listeners = ['stepSaved' => '$refresh'];

    public function render()
    {
        return view('livewire.steps', [
            'processes' => Cache::rememberForever('steps_processes', fn () => Process::orderBy('name')->get(['name', 'id'])),
            'steps' => $this->process_id === 0 ? null : $this->getSteps(),
        ]);
    }

    protected function getSteps()
    {
        return Step::query()
            ->with(['process'])
            ->when($this->process_id > 0, function ($query): void {
                $query->whereHas('process', fn ($query) => $query->where('id', '=', $this->process_id));
            })
            ->when(
                $this->search,
                function ($query): void {

                    $query->where(function ($query): void {
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
