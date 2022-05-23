<?php

namespace Tests\Feature\Api\Dashboard;

use App\Models\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;
use Tests\TestCase;

class HumanResourcesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_returns_a_collection_of_attritions_data()
    {
        factory(Employee::class)->create();
        Passport::actingAs($this->user());

        $response = $this->get('/api/dashboards/human_resources/attritions');

        $response->assertStatus(200)
            ->assertJsonStructure([
                '*' => [
                    'month',
                    'head_count',
                    'terminations',
                    'attrition',
                ],
            ]);
    }

    /** @test */
    public function it_returns_a_collection_of_hc_by_department()
    {
        factory(Employee::class)->create();
        Passport::actingAs($this->user());

        $response = $this->get('/api/dashboards/human_resources/hc_by_department');

        $response->assertStatus(200)
            ->assertJsonStructure([
                '*' => [
                    'id',
                    'name',
                    'created_at',
                    'updated_at',
                    'employees_count',
                ],
            ]);
    }

    /** @test */
    public function it_returns_a_collection_of_hc_by_gender()
    {
        factory(Employee::class)->create();
        Passport::actingAs($this->user());

        $response = $this->get('/api/dashboards/human_resources/hc_by_gender');

        $response->assertStatus(200)
            ->assertJsonStructure([
                '*' => [
                    'id',
                    'name',
                    'created_at',
                    'updated_at',
                    'employees_count',
                ],
            ]);
    }

    /** @test */
    public function it_returns_a_collection_of_hc_by_project()
    {
        factory(Employee::class)->create();
        Passport::actingAs($this->user());

        $response = $this->get('/api/dashboards/human_resources/hc_by_project');

        $response->assertStatus(200)
            ->assertJsonStructure([
                '*' => [
                    'id',
                    'name',
                    'client_id',
                    'created_at',
                    'updated_at',
                    'employees_count',
                ],
            ]);
    }

    /** @test */
    public function it_returns_a_collection_of_head_counts()
    {
        factory(Employee::class)->create();
        Passport::actingAs($this->user());

        $response = $this->get('/api/dashboards/human_resources/head_counts');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'head_count',
                'attrition_mtd',
                'hired_tm',
                'terminated_tm',
            ]);
    }
}
