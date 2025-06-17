<?php

namespace Tests\Feature\Reports;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testGuestCantViewReports()
    {
        $report = create(\App\Models\Report::class);

        $this->get(route('admin.reports.index'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->get(route('admin.reports.show', $report->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function testGuestCantCreateReports()
    {
        $report = create(\App\Models\Report::class);

        $this->get(route('admin.reports.create'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->post(route('admin.reports.store'), $report->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function testGuestCantUpdateReport()
    {
        $report = create(\App\Models\Report::class);

        $this->get(route('admin.reports.edit', $report->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->put(route('admin.reports.update', $report->id), $report->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function testGuestCantDestroyReport()
    {
        $report = create(\App\Models\Report::class);

        $this->delete(route('admin.reports.destroy', $report->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }
}
