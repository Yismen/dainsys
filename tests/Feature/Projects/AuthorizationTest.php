<?php

namespace Tests\Feature\Projects;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_unuthorized_users_cant_view_project()
    {
        $project = create(\App\Models\Project::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->get(route('admin.projects.index'))
            ->assertForbidden();

        $response->get(route('admin.projects.show', $project->id))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_createt_project()
    {
        $project = create(\App\Models\Project::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->post(route('admin.projects.store'))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_edit_project()
    {
        $project = create(\App\Models\Project::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->put(route('admin.projects.update', $project->id))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_destroy_project()
    {
        $project = create(\App\Models\Project::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->delete(route('admin.projects.destroy', $project->id))
            ->assertForbidden();
    }
}
