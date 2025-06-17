<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Submenu extends Component
{
    public string $label;

    public array $links;

    public bool $target;

    /**
     * Mount method
     *
     * @param  string  $label:  Label to be displayed
     * @param  array  $links:  Links to render. Each item must have a text and route key. Example: [['text' => 'About', 'route] => '/admin/about']
     * @param  bool  $target:  On click open a new tab. You may pass this as part of the menu items as well: [['text' => 'About', 'route] => '/admin/about', 'target' => '_new']
     * @return void
     */
    public function mount(string $label = 'Sub Menu', array $links = [], bool $target = false)
    {
        $this->label = $label;
        $this->links = $links;
        $this->target = $target;
    }

    public function render()
    {
        return view('livewire.submenu');
    }

    public function add(array $link)
    {
        $this->links[] = $link;
    }
}
