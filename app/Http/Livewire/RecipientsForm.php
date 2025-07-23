<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Traits\HasLivewirePagination;
use App\Models\Recipient;
use Livewire\Component;

class RecipientsForm extends Component
{
    use HasLivewirePagination;

    public array $fields = [
        'name' => null,
        'email' => null,
        'title' => null,
    ];

    public bool $is_editing = false;

    public Recipient $recipient;

    protected $listeners = ['wantsCreateRecipient', 'wantsEditRecipient'];

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
        $this->reset(['fields', 'is_editing']);
        $this->resetValidation();
        $this->dispatchBrowserEvent('showRecipientModal');
    }

    public function wantsEditRecipient(Recipient $recipient)
    {
        $this->recipient = $recipient;
        $this->is_editing = true;
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
            // 'fields.title' => 'min:3',
        ]);

        $recipient->create($this->fields);

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

        $this->emit('recipientSaved');
        $this->dispatchBrowserEvent('hideRecipientModal');
    }
}
