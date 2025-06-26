<?php

namespace Tests\Feature\Projects;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_guest_cant_view_projects()
    {
        $project = create(\App\Models\Project::class);

        $this->get(route('admin.projects.index'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->get(route('admin.projects.show', $project->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_create_projects()
    {
        $project = create(\App\Models\Project::class);

        $this->get(route('admin.projects.create'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->post(route('admin.projects.store'), $project->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_update_project()
    {
        $project = create(\App\Models\Project::class);

        $this->get(route('admin.projects.edit', $project->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->put(route('admin.projects.update', $project->id), $project->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_destroy_project()
    {
        $project = create(\App\Models\Project::class);

        $this->delete(route('admin.projects.destroy', $project->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }
}
