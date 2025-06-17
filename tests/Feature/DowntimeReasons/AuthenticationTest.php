<?php

namespace Tests\Feature\DowntimeReasons;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_guest_cant_view_downtime_reasons()
    {
        $downtime_reason = create(\App\Models\DowntimeReason::class);

        $this->get(route('admin.downtime_reasons.index'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->get(route('admin.downtime_reasons.show', $downtime_reason->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_create_downtime_reasons()
    {
        $downtime_reason = create(\App\Models\DowntimeReason::class);

        $this->get(route('admin.downtime_reasons.create'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->post(route('admin.downtime_reasons.store'), $downtime_reason->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_update_downtime_reason()
    {
        $downtime_reason = create(\App\Models\DowntimeReason::class);

        $this->get(route('admin.downtime_reasons.edit', $downtime_reason->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->put(route('admin.downtime_reasons.update', $downtime_reason->id), $downtime_reason->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_destroy_downtime_reason()
    {
        $downtime_reason = create(\App\Models\DowntimeReason::class);

        $this->delete(route('admin.downtime_reasons.destroy', $downtime_reason->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }
}
