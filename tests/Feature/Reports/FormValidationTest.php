<?php

namespace Tests\Feature\Reports;

use App\Models\Report;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FormValidationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function name_field_is_required()
    {
        $report = create(Report::class)->toArray();

        $this->actingAs($this->userWithPermission('create-reports'))
            ->post(route('admin.reports.store'), array_merge($report, ['name' => '']))
            ->assertSessionHasErrors('name');

        $this->actingAs($this->userWithPermission('edit-reports'))
            ->put(route('admin.reports.update', $report['id']), array_merge($report, ['name' => '']))
            ->assertSessionHasErrors('name');
    }

    /** @test */
    public function key_field_is_required()
    {
        $report = create(Report::class)->toArray();

        $this->actingAs($this->userWithPermission('create-reports'))
            ->post(route('admin.reports.store'), array_merge($report, ['key' => '']))
            ->assertSessionHasErrors('key');

        $this->actingAs($this->userWithPermission('edit-reports'))
            ->put(route('admin.reports.update', $report['id']), array_merge($report, ['key' => '']))
            ->assertSessionHasErrors('key');
    }
}
