<?php

namespace Tests\Feature\DowntimeReasons;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_unuthorized_users_cant_view_downtime_reason()
    {
        $downtime_reason = create(\App\Models\DowntimeReason::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->get(route('admin.downtime_reasons.index'))
            ->assertForbidden();

        $response->get(route('admin.downtime_reasons.show', $downtime_reason->id))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_createt_downtime_reason()
    {
        $downtime_reason = create(\App\Models\DowntimeReason::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->post(route('admin.downtime_reasons.store'))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_edit_downtime_reason()
    {
        $downtime_reason = create(\App\Models\DowntimeReason::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->put(route('admin.downtime_reasons.update', $downtime_reason->id))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_destroy_downtime_reason()
    {
        $downtime_reason = create(\App\Models\DowntimeReason::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->delete(route('admin.downtime_reasons.destroy', $downtime_reason->id))
            ->assertForbidden();
    }
}
