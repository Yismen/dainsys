<?php

namespace Tests\Feature\Reports;

use Tests\TestCase;
use App\Models\Report;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ModuleActionsTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function it_lists_all_reports_paginated()
    {
        $user = $this->userWithPermission('view-reports');
        $this->be($user);
        $report = create(Report::class);

        $this->get(route('admin.reports.index'))
            ->assertOk()
            ->assertViewIs('reports.index');
    }

    /** @test */
    public function authorized_users_can_store_report()
    {
        $report = make(Report::class)->toArray();

        $this->actingAs($this->userWithPermission('create-reports'))
            ->post(route('admin.reports.store'), $report)
            ->assertRedirect()
            ->assertLocation(route('admin.reports.index'));

        $this->assertDatabaseHas('reports', $report);
    }

    /** @test */
    public function authorized_users_can_see_edit_page()
    {
        $report = create(Report::class);

        $this->actingAs($this->userWithPermission('edit-reports'))
            ->get(route('admin.reports.edit', $report->id))
            ->assertOk()
            ->assertViewIs('reports.edit');
    }

    /** @test */
    public function authorized_users_can_update_report()
    {
        $report = create(Report::class);

        $data_array = [
            'name' => 'New Name',
            'key' => 'new-key',
            'active' => false,
            'description' => 'new-description',
        ];

        $this->actingAs($this->userWithPermission('edit-reports'))
            ->put(route('admin.reports.update', $report->id), array_merge($report->toArray(), $data_array))
            ->assertLocation(route('admin.reports.index'));

        $this->assertDatabaseHas('reports', $data_array);
    }

    /** @test */
    public function active_defaults_to_false_on_create()
    {
        $report = create(Report::class);

        $data_array = [
            'name' => 'New Name',
            'key' => 'new-key',
            'description' => 'new-description',
        ];

        $this->actingAs($this->userWithPermission('edit-reports'))
            ->put(route('admin.reports.update', $report->id), $data_array)
            ->assertLocation(route('admin.reports.index'));

        $this->assertDatabaseHas('reports', array_merge($data_array, ['active' => false]));
    }
}
