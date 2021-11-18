<?php

namespace Tests\Feature\Downtimes;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testGuestCantViewDowntimes()
    {
        $downtime = create('App\Downtime');

        $this->get(route('admin.downtimes.index'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        // $this->get(route('admin.downtimes.show', $downtime->id))
        //     ->assertStatus(302)
        //     ->assertRedirect(route('login'));
    }

    public function testGuestCantCreateDowntimes()
    {
        $downtime = create('App\Downtime');

        $this->get(route('admin.downtimes.create'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->post(route('admin.downtimes.store'), $downtime->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function testGuestCantUpdateDowntime()
    {
        $downtime = create('App\Downtime');

        $this->get(route('admin.downtimes.edit', $downtime->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->put(route('admin.downtimes.update', $downtime->id), $downtime->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function testGuestCantDestroyDowntime()
    {
        $downtime = create('App\Downtime');

        $this->delete(route('admin.downtimes.destroy', $downtime->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }
}
