<?php

namespace Tests\Feature\Projects;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testGuestCantViewProjects()
    {
        $project = create('App\Project');

        $this->get(route('admin.projects.index'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->get(route('admin.projects.show', $project->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function testGuestCantCreateProjects()
    {
        $project = create('App\Project');

        $this->get(route('admin.projects.create'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->post(route('admin.projects.store'), $project->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function testGuestCantUpdateProject()
    {
        $project = create('App\Project');

        $this->get(route('admin.projects.edit', $project->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->put(route('admin.projects.update', $project->id), $project->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function testGuestCantDestroyProject()
    {
        $project = create('App\Project');

        $this->delete(route('admin.projects.destroy', $project->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }
}
