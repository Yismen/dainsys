<?php

namespace Tests\Feature\Schedules;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testUnuthorizedUsersCantViewSchedule()
    {
        $schedule = create('App\Models\Schedule');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->get(route('admin.schedules.index'))
            ->assertForbidden();

        $response->get(route('admin.schedules.show', $schedule->id))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantCreatetSchedule()
    {
        $schedule = create('App\Models\Schedule');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->post(route('admin.schedules.store'))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantEditSchedule()
    {
        $schedule = create('App\Models\Schedule');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->put(route('admin.schedules.update', $schedule->id))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantDestroySchedule()
    {
        $schedule = create('App\Models\Schedule');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->delete(route('admin.schedules.destroy', $schedule->id))
            ->assertForbidden();
    }
}
