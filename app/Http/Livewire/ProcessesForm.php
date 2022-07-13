<?php

namespace App\Http\Livewire;

use App\Models\Process;
use Livewire\Component;
use App\Http\Livewire\Traits\HasLivewirePagination;

class ProcessesForm extends Component
{
    use HasLivewirePagination;

    protected $listeners = ['wantsCreateProcess', 'wantsEditProcess'];
    public array $fields = [
        'name' => null,
        'description' => null,
    ];
    public bool $is_editing = false;
    public Process $process;
    protected $rules = [
        'fields.name' => 'required|min:3|unique:steps,name',
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
