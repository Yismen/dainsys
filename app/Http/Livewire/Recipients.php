<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Recipient;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Livewire\Traits\HasLivewirePagination;

class Recipients extends Component
{
    use HasLivewirePagination;
    use AuthorizesRequests;

    protected $listeners = ['searchUpdated', 'recipientSaved' => '$refresh'];

    protected $search = null;

    public function render()
    {
        $this->authorize('view-recipients');

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
