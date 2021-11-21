<?php

namespace Tests\Feature\Api;

use App\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Passport\Passport;
use Tests\TestCase;

class ProjectsControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_returns_a_projects_collection()
    {
        factory(Project::class)->create();
        Passport::actingAs($this->user());

        $response = $this->json('GET', '/api/performances/projects');

        $response->assertOk()
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'name',
                        'client',
                    ]
                ]
            ]);
    }
}
