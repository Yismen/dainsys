<?php

namespace Tests\Feature\Projects;

use App\Project;
use App\Employee;
use App\User;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

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
