<?php

namespace App\Http\Livewire;

use App\Models\Step;
use App\Models\Process;
use Livewire\Component;
use Illuminate\Support\Facades\Cache;
use App\Http\Livewire\Traits\HasLivewirePagination;

class StepsForm extends Component
{
    use HasLivewirePagination;

    protected $listeners = ['wantsCreateStep', 'wantsEditStep'];
    public array $fields = [
        'name' => null,
        'process_id' => null,
        'order' => null,
        'description' => null,
    ];
    public bool $is_editing = false;
    public Step $step;
    protected $rules = [
        'fields.name' => 'required|min:3|unique:steps,name',
        'fields.process_id' => 'required|exists:processes,id',
        'fields.order' => 'required|numeric',
        'fields.description' => 'max:1000',
    ];

    public function render()
    {
        return view('livewire.steps-form', [
            'processes' => Cache::rememberForever('steps_processes', function () {
                return Process::orderBy('name')->get(['name', 'id']);
            }),
        ]);
    }

    public function wantsCreateStep()
    {
        $this->reset(['fields', 'is_editing']);
        $this->resetValidation();
        $this->dispatchBrowserEvent('showStepModal');
    }

    public function wantsEditStep(Step $step)
    {
        $this->step = $step;
        $this->is_editing = true;
        $this->fields['name'] = $step->name;
        $this->fields['process_id'] = $step->process_id;
        $this->fields['order'] = $step->order;
        $this->fields['description'] = $step->description;
        $this->resetValidation();
        $this->dispatchBrowserEvent('showStepModal');
    }

    public function store(Step $step)
    {
        $this->validate();

        $step->create($this->fields);

        $this->emit('stepSaved');
        $this->dispatchBrowserEvent('hideStepModal');
    }

    public function update()
    {
        $rules = array_merge($this->rules, [
            'fields.name' => 'required|min:3|unique:processes,name,' . $this->step->id,
        ]);
        $this->validate($rules);
        $this->step->update($this->fields);

        $this->emit('stepSaved');
        $this->dispatchBrowserEvent('hideStepModal');
    }
}
