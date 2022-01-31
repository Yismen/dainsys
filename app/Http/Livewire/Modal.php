<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Modal extends Component
{
    public $component;
    public $params = [];

    protected $listeners = ['showModal', 'resetModal'];

    public $title;

    public function render()
    {
        return view('livewire.modal');
    }

    public function showModal($component = '', ...$params)
    {
        $this->component = $component;
        $this->params = $params;

        $this->dispatchBrowserEvent('showBootstrapModal');
    }

    public function resetModal()
    {
        $this->reset();
    }
}
