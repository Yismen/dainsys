<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Confirmation extends Component
{
    public string $name;
    public int $model_id;
    public string $confirmed_event_name;
    public string $title;
    public string $message;
    public string $icon;
    public string $button_text;
    public string $button_class;

    /**
     * Initialize the component
     *
     * @param  string      $name                 the name for the modals. Usually related to the database model you are working with. Esample: User
     * @param int $model_id the unique id for the database model so each modal modal becomes unique
     * @param  string|null $confirmed_event_name the name of he event you want to record once the modal is confirmed
     * @param  string|null $title                modal window title
     * @param  string|null $message              modal body message
     * @param  string|null $icon
     * @param  string|null $button_text
     * @param  string|null $button_class
     *
     * @return void
     */
    public function mount(
        string $name,
        int $model_id,
        ?string $confirmed_event_name = null,
        ?string $title = null,
        ?string $message = null,
        ?string $icon = null,
        ?string $button_text = null,
        ?string $button_class = null
    ) {
        $this->name = $name;
        $this->model_id = $model_id;
        $this->confirmed_event_name = $confirmed_event_name ?: 'confirmed';
        $this->title = $title ?: 'Are you sure you want to proceed?';
        $this->message = $message ?: 'You may not be able to revert this action. Please proceed carefully or hit on cancel';
        $this->icon = $icon ?: 'fa fa-trash';
        $this->button_text = $button_text ?: 'Delete';
        $this->button_class = $button_class ?: 'btn btn-xs btn-danger';
    }

    /**
     * Render the view
     *
     * @return void
     */
    public function render()
    {
        return view('livewire.confirmation');
    }

    /**
     * Show the confirmation modal
     *
     * @return void
     */
    public function show()
    {
        $this->dispatchBrowserEvent("show{$this->name}{$this->model_id}Confirmation");
    }

    /**
     * The modal was confirmed
     *
     *
     * Emit a livewire event so your component can respond to that event.
     *
     * @return void
     */
    public function confirmed(): void
    {
        $this->emit($this->name . $this->confirmed_event_name, $this->model_id);
        $this->dispatchBrowserEvent("hide{$this->name}{$this->model_id}Confirmation");
    }

    /**
     * The modal was cancellet
     *
     * @return void
     */
    public function cancelled()
    {
        // $this->emit("confirmation{$this->confirmed_event_name}Cancelled");
        // $this->emit($this->name . $this->confirmed_event_name, $this->model_id);

        $this->dispatchBrowserEvent("hide{$this->name}{$this->model_id}Confirmation");
    }
}
