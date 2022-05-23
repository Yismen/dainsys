<?php

namespace Tests\Feature\DowntimeReasons;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testGuestCantViewDowntimeReasons()
    {
        $downtime_reason = create('App\Models\DowntimeReason');

        $this->get(route('admin.downtime_reasons.index'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->get(route('admin.downtime_reasons.show', $downtime_reason->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function testGuestCantCreateDowntimeReasons()
    {
        $downtime_reason = create('App\Models\DowntimeReason');

        $this->get(route('admin.downtime_reasons.create'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->post(route('admin.downtime_reasons.store'), $downtime_reason->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function testGuestCantUpdateDowntimeReason()
    {
        $downtime_reason = create('App\Models\DowntimeReason');

        $this->get(route('admin.downtime_reasons.edit', $downtime_reason->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->put(route('admin.downtime_reasons.update', $downtime_reason->id), $downtime_reason->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function testGuestCantDestroyDowntimeReason()
    {
        $downtime_reason = create('App\Models\DowntimeReason');

        $this->delete(route('admin.downtime_reasons.destroy', $downtime_reason->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }
}
