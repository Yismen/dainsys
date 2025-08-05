<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Recipient;
use Illuminate\Support\Facades\Gate;
use App\Traits\Livewire\HasLivewireSearch;
use App\Http\Livewire\Traits\HasLivewirePagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Recipients extends Component
{
    use HasLivewirePagination;
    use AuthorizesRequests;
    use HasLivewireSearch;

    protected $listeners = ['recipientSaved' => '$refresh'];

    public function render()
    {
        $this->authorize('view-recipients');

        return view('livewire.recipients', [
            'recipients' => Recipient::query()
                // ->withCount('reports')
                ->with(['reports'])
                ->when(
                    $this->search,
                    function ($query): void {

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
}
