<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Search extends Component
{
    public $search = '';

    public int $count = 0;

    public $debounce;

    public function mount(string $debounce = 'lazy')
    {
        $this->debounce = $debounce;

        $this->search = request()->query('search', $this->search);

        $this->setCount();
    }

    public function render()
    {
        return view('livewire.search');
    }

    public function updatedSearch()
    {
        $this->emit('searchUpdated', $this->search);

        return $this->setCount();
    }

    protected function setCount(): void
    {
        $this->count = strlen(trim((string) $this->search));
    }
}
