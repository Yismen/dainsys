<?php

namespace Tests\Feature\Api_V2;

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;
use Tests\TestCase;

class ProjectsControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_returns_a_projects_collection()
    {
        Project::factory()->create();
        Passport::actingAs($this->user());

        $response = $this->get('/api/v2/projects');

        $response->assertOk()
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'name',
                        'client',
                    ],
                ],
            ]);
    }
}
