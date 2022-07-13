<?php

namespace Tests\Feature\Http\Livewire;

use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use Illuminate\Support\Str;
use App\Http\Livewire\Confirmation;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ConfirmationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function confirmation_component_render_correct_view()
    {
        Livewire::test(Confirmation::class, ['name' => 'users', 'model_id' => 1])
            ->assertSet('name', 'users')
            ->assertViewIs('livewire.confirmation')
            ;
    }

    /** @test */
    public function confirmation_fires_browser_event_when_show_property_is_updated()
    {
        Livewire::test(Confirmation::class, ['name' => 'users', 'model_id' => 1])
            ->call("show")
            ->assertDispatchedBrowserEvent("showusers1Confirmation")
            ->call('confirmed')
            ->assertEmitted("usersconfirmed", 1)
            ->assertDispatchedBrowserEvent("hideusers1Confirmation")
            ->call('cancelled')
            // ->assertEmitted("usersconfirmedCancelled")
            ->assertDispatchedBrowserEvent("hideusers1Confirmation")
            ;
    }
}
