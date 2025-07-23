<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Traits\HasLivewirePagination;
use App\Models\Recipient;
use Livewire\Component;

class Recipients extends Component
{
    use HasLivewirePagination;

    protected $listeners = ['searchUpdated', 'recipientSaved' => '$refresh'];

    protected $search = null;

    public function render()
    {
        return view('livewire.recipients', [
            'recipients' => Recipient::query()
                ->withCount('reports')
                ->when(
                    $this->search,
                    function ($query): void {
                        $this->resetPage();

                        $query->where(function ($query): void {
                            $query->where('name', 'like', "%{$this->search}%")
                                ->orWhere('email', 'like', "%{$this->search}%");
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
