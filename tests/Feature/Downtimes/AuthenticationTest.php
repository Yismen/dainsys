<?php

namespace Tests\Feature\Downtimes;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_guest_cant_view_downtimes()
    {
        $downtime = create(\App\Models\Downtime::class);

        $this->get(route('admin.downtimes.index'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        // $this->get(route('admin.downtimes.show', $downtime->id))
        //     ->assertStatus(302)
        //     ->assertRedirect(route('login'));
    }

    public function test_guest_cant_create_downtimes()
    {
        $downtime = create(\App\Models\Downtime::class);

        $this->get(route('admin.downtimes.create'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->post(route('admin.downtimes.store'), $downtime->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_update_downtime()
    {
        $downtime = create(\App\Models\Downtime::class);

        $this->get(route('admin.downtimes.edit', $downtime->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->put(route('admin.downtimes.update', $downtime->id), $downtime->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_destroy_downtime()
    {
        $downtime = create(\App\Models\Downtime::class);

        $this->delete(route('admin.downtimes.destroy', $downtime->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }
}
