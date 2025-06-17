<?php

namespace Tests\Feature\Projects;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testUnuthorizedUsersCantViewProject()
    {
        $project = create(\App\Models\Project::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->get(route('admin.projects.index'))
            ->assertForbidden();

        $response->get(route('admin.projects.show', $project->id))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantCreatetProject()
    {
        $project = create(\App\Models\Project::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->post(route('admin.projects.store'))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantEditProject()
    {
        $project = create(\App\Models\Project::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->put(route('admin.projects.update', $project->id))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantDestroyProject()
    {
        $project = create(\App\Models\Project::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->delete(route('admin.projects.destroy', $project->id))
            ->assertForbidden();
    }
}
