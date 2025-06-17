<?php

namespace Tests\Feature\Reports;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_unuthorized_users_cant_view_report()
    {
        $report = create(\App\Models\Report::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->get(route('admin.reports.index'))
            ->assertForbidden();

        $response->get(route('admin.reports.show', $report->id))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_createt_report()
    {
        $report = create(\App\Models\Report::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->post(route('admin.reports.store'))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_edit_report()
    {
        $report = create(\App\Models\Report::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->put(route('admin.reports.update', $report->id))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_destroy_report()
    {
        $report = create(\App\Models\Report::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->delete(route('admin.reports.destroy', $report->id))
            ->assertForbidden();
    }
}
