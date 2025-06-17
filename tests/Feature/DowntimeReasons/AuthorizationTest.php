<?php

namespace Tests\Feature\DowntimeReasons;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testUnuthorizedUsersCantViewDowntimeReason()
    {
        $downtime_reason = create(\App\Models\DowntimeReason::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->get(route('admin.downtime_reasons.index'))
            ->assertForbidden();

        $response->get(route('admin.downtime_reasons.show', $downtime_reason->id))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantCreatetDowntimeReason()
    {
        $downtime_reason = create(\App\Models\DowntimeReason::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->post(route('admin.downtime_reasons.store'))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantEditDowntimeReason()
    {
        $downtime_reason = create(\App\Models\DowntimeReason::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->put(route('admin.downtime_reasons.update', $downtime_reason->id))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantDestroyDowntimeReason()
    {
        $downtime_reason = create(\App\Models\DowntimeReason::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->delete(route('admin.downtime_reasons.destroy', $downtime_reason->id))
            ->assertForbidden();
    }
}
