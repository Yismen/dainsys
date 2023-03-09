<?php

namespace App\Http\Livewire;

use App\Models\RingCentral\Disposition;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class DispositionForm extends Component
{
    use WithPagination;

    public int $modelId = 0;
    public string $name = '';
    public int $contacts = 0;
    public int $sales = 0;
    public int $upsales = 0;
    public int $cc_sales = 0;
    public bool $editing = false;

    protected $listeners = [
        'wantsCreate',
        'wantsEdit',
    ];

    public function mount($disposition = null)
    {
        if ($disposition) {
            $this->modelId = $disposition->modelId;
            $this->name = $disposition->name;
            $this->contacts = $disposition->contacts;
            $this->sales = $disposition->sales;
            $this->upsales = $disposition->upsales;
            $this->cc_sales = $disposition->cc_sales;
            $this->editing = true;
        }
    }

    public function render()
    {
        return view('livewire.disposition-form');
    }

    public function wantsCreate($disposition)
    {
        $this->name = $disposition['agent_disposition'] ?? '';
        $this->contacts = 0;
        $this->sales = 0;
        $this->upsales = 0;
        $this->cc_sales = 0;
        $this->modelId = 0;
        $this->editing = false;

        $this->dispatchBrowserEvent('showDispositionModal');
    }

    public function wantsEdit($disposition)
    {
        $this->modelId = $disposition['id'];
        $this->name = $disposition['name'];
        $this->contacts = $disposition['contacts'];
        $this->sales = $disposition['sales'];
        $this->upsales = $disposition['upsales'];
        $this->cc_sales = $disposition['cc_sales'];
        $this->editing = true;

        $this->dispatchBrowserEvent('showDispositionModal');
    }

    public function create()
    {
        $this->validate();

        Disposition::create([
            'name' => $this->name,
            'contacts' => $this->contacts,
            'sales' => $this->sales,
            'upsales' => $this->upsales,
            'cc_sales' => $this->cc_sales,
        ]);

        $this->emit('dispositionsCreated');

        $this->resetPage();

        $this->reset([
            'id',
            'name',
            'contacts',
            'sales',
            'upsales',
            'cc_sales',
            'editing',
        ]);

        $this->dispatchBrowserEvent('closeDispositionModal');
    }

    public function update()
    {
        $this->validate();

        $disposition = Disposition::find($this->modelId);

        $disposition->update([
            'name' => $this->name,
            'contacts' => $this->contacts,
            'sales' => $this->sales,
            'upsales' => $this->upsales,
            'cc_sales' => $this->cc_sales,
        ]);

        $this->emit('dispositionsUpdated');
        $this->reset([
            'id',
            'name',
            'contacts',
            'sales',
            'upsales',
            'cc_sales',
            'editing',
        ]);

        $this->dispatchBrowserEvent('closeDispositionModal');
    }

    protected function getRules(): array
    {
        return [
            'name' => [
                'required',
                Rule::unique(Disposition::class, 'name')->ignore($this->modelId, 'id'),
            ],
        ];
    }
}
