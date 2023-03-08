<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Traits\HasLivewirePagination;
use App\Models\Process;
use Livewire\Component;

class ProcessesForm extends Component
{
    use HasLivewirePagination;
    public array $fields = [
        'name' => null,
        'default' => false,
        'description' => null,
    ];
    public bool $is_editing = false;
    public Process $process;

    protected $listeners = ['wantsCreateProcess', 'wantsEditProcess'];
    protected $rules = [
        'fields.name' => 'required|min:3|unique:steps,name',
        'fields.default' => 'required|boolean',
    ];

    public function render()
    {
        return view('livewire.processes-form');
    }

    public function wantsCreateProcess()
    {
        $this->reset(['fields', 'is_editing']);
        $this->resetValidation();
        $this->dispatchBrowserEvent('showProcessModal');
    }

    public function wantsEditProcess(Process $process)
    {
        $this->process = $process;
        $this->is_editing = true;
        $this->fields['name'] = $process->name;
        $this->fields['default'] = $process->default;
        $this->fields['description'] = $process->description;
        $this->resetValidation();
        $this->dispatchBrowserEvent('showProcessModal');
    }

    public function store(Process $process)
    {
        $this->validate([
            'fields.name' => 'required|min:3|unique:processes,name',
            // 'fields.description' => 'min:3',
        ]);

        $process->create($this->fields);

        $this->emit('processSaved');
        $this->dispatchBrowserEvent('hideProcessModal');
    }

    public function update()
    {
        $rules = array_merge($this->rules, [
            'fields.name' => 'required|min:3|unique:processes,name,' . $this->process->id,
            'fields.description' => 'max:1000',
        ]);
        $this->validate($rules);
        $this->process->update($this->fields);

        $this->emit('processSaved');
        $this->dispatchBrowserEvent('hideProcessModal');
    }
}
