<?php

namespace Tests\Feature\Reports;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testUnuthorizedUsersCantViewReport()
    {
        $report = create('App\Models\Report');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->get(route('admin.reports.index'))
            ->assertForbidden();

        $response->get(route('admin.reports.show', $report->id))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantCreatetReport()
    {
        $report = create('App\Models\Report');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->post(route('admin.reports.store'))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantEditReport()
    {
        $report = create('App\Models\Report');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->put(route('admin.reports.update', $report->id))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantDestroyReport()
    {
        $report = create('App\Models\Report');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->delete(route('admin.reports.destroy', $report->id))
            ->assertForbidden();
    }
}
