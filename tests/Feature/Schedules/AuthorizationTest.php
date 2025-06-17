<?php

namespace Tests\Feature\Schedules;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_unuthorized_users_cant_view_schedule()
    {
        $schedule = create(\App\Models\Schedule::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->get(route('admin.schedules.index'))
            ->assertForbidden();

        $response->get(route('admin.schedules.show', $schedule->id))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_createt_schedule()
    {
        $schedule = create(\App\Models\Schedule::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->post(route('admin.schedules.store'))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_edit_schedule()
    {
        $schedule = create(\App\Models\Schedule::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->put(route('admin.schedules.update', $schedule->id))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_destroy_schedule()
    {
        $schedule = create(\App\Models\Schedule::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->delete(route('admin.schedules.destroy', $schedule->id))
            ->assertForbidden();
    }
}
