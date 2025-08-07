<?php

namespace App\Http\Livewire;

use App\Models\Report;
use Livewire\Component;
use App\Models\Recipient;
use Illuminate\Support\Facades\Cache;
use App\Http\Livewire\Traits\HasLivewirePagination;

class RecipientsForm extends Component
{
    use HasLivewirePagination;

    public array $fields = [
        'name' => null,
        'email' => null,
        'title' => null,
        'reports' => [],
        'all_reports' => [],
        'selected_reports' => [],
    ];

    public bool $is_editing = false;

    public bool $is_showing = false;

    public Recipient $recipient;

    protected $listeners = ['wantsCreateRecipient', 'wantsEditRecipient', 'wantsShowRecipient'];

    protected $rules = [
        'fields.name' => 'required|min:3|unique:recipients,name',
        'fields.email' => 'required|email|unique:recipients,email',
    ];

    public function render()
    {
        return view('livewire.recipients-form');
    }

    public function wantsCreateRecipient()
    {
        $this->reset(['fields', 'is_editing', 'is_showing']);
        $this->fields['all_reports'] = $this->getReports();
        $this->resetValidation();
        $this->dispatchBrowserEvent('showRecipientModal');
    }

    public function wantsEditRecipient(Recipient $recipient)
    {
        $this->reset(['fields', 'is_editing', 'is_showing']);
        $this->recipient = $recipient;
        $this->recipient->load('reports');
        $this->fields['reports'] = $recipient->reports->pluck('id')->toArray();
        $this->fields['all_reports'] = $this->getReports();

        $this->fields['name'] = $recipient->name;
        $this->is_editing = true;
        $this->fields['name'] = $recipient->name;
        $this->fields['email'] = $recipient->email;
        $this->fields['title'] = $recipient->title;
        $this->resetValidation();
        $this->dispatchBrowserEvent('showRecipientModal');
    }

    public function wantsShowRecipient(Recipient $recipient)
    {
        $this->recipient = $recipient;
        $this->recipient->load('reports'); // Eager load reports to avoid N+1 query issue
        $this->reset(['fields', 'is_editing', 'is_showing']);
        $this->is_showing = true;
        $this->fields['name'] = $recipient->name;
        $this->fields['email'] = $recipient->email;
        $this->fields['title'] = $recipient->title;
        $this->resetValidation();
        $this->dispatchBrowserEvent('showRecipientModal');
    }

    public function store(Recipient $recipient)
    {
        $this->validate([
            'fields.name' => 'required|min:3|unique:recipients,name',
            'fields.email' => 'required|email|unique:recipients,email'
            // 'fields.title' => 'min:3',
        ]);

        $recipient = $recipient->create($this->fields);
        $recipient->reports()->sync($this->fields['reports']);

        $this->emit('recipientSaved');
        $this->dispatchBrowserEvent('hideRecipientModal');
    }

    public function update()
    {
        $rules = array_merge($this->rules, [
            'fields.name' => 'required|min:3|unique:recipients,name,'.$this->recipient->id,
            'fields.email' => 'required|email|unique:recipients,email,'.$this->recipient->id,
        ]);
        $this->validate($rules);
        $this->recipient->update($this->fields);

        $this->recipient->reports()->sync($this->fields['reports']);

        $this->emit('recipientSaved');
        $this->dispatchBrowserEvent('hideRecipientModal');
    }

    protected function getReports() {
        return Cache::remember('reports_list', 60, function () {
            return Report::orderBy('name')
                ->pluck('name', 'id')
                ->toArray();
        });
    }
}
