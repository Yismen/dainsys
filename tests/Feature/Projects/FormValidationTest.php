<?php

namespace Tests\Feature\Projects;

use App\Models\Project;
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
        $project = create(Project::class)->toArray();

        $this->actingAs($this->userWithPermission('create-projects'))
            ->post(route('admin.projects.store'), array_merge($project, ['name' => '']))
            ->assertSessionHasErrors('name');

        $this->actingAs($this->userWithPermission('edit-projects'))
            ->put(route('admin.projects.update', $project['id']), array_merge($project, ['name' => '']))
            ->assertSessionHasErrors('name');
    }
}
