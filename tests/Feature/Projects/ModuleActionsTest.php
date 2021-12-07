<?php

namespace Tests\Feature\Projects;

use App\Project;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ModuleActionsTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function it_lists_all_users_assigned_with_projects()
    {
        $user = $this->userWithPermission('view-projects');
        $this->be($user);
        $project = create(Project::class);

        $this->get(route('admin.projects.index'))
            ->assertOk()
            ->assertViewIs('projects.index');
    }

    /** @test */
    public function authorized_users_can_store_project()
    {
        $project = make(Project::class)->toArray();

        $this->actingAs($this->userWithPermission('create-projects'))
            ->post(route('admin.projects.store', $project))
            ->assertRedirect()
            ->assertLocation(route('admin.projects.index'));

        $this->assertDatabaseHas('projects', $project);
    }

    /** @test */
    public function authorized_users_can_see_edit_page()
    {
        $project = create(Project::class);

        $this->actingAs($this->userWithPermission('edit-projects'))
            ->get(route('admin.projects.edit', $project->id))
            ->assertOk()
            ->assertViewIs('projects.edit');
    }

    /** @test */
    public function authorized_users_can_update_project()
    {
        $project = create(Project::class);

        $data_array = [
            'name' => 'New Name',
        ];

        $this->actingAs($this->userWithPermission('edit-projects'))
            ->put(route('admin.projects.update', $project->id), array_merge($project->toArray(), $data_array))
            ->assertLocation(route('admin.projects.index'));

        $this->assertDatabaseHas('projects', $data_array);
    }

    /** @test */
    public function authorized_users_can_destroy_project()
    {
        $project = create(Project::class);

        $this->actingAs($this->userWithPermission('destroy-projects'))
            ->delete(route('admin.projects.destroy', $project->id))
            ->assertRedirect()
            ->assertLocation(route('admin.projects.index'));

        $this->assertDatabaseMissing('projects', $project->toArray());
    }
}
