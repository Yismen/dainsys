<?php

namespace Tests\Feature\Api;

use App\Department;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Passport\Passport;
use Tests\TestCase;

class DepartmentTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_validates_request_to_create_department()
    {
        Passport::actingAs($this->user());
        $attributes = [
            'name' => ''
        ];

        $response = $this->post('/api/departments', $attributes);

        $response->assertInvalid(array_keys($attributes));
    }

    /** @test */
    public function it_creates_a_department_and_returns_json()
    {
        $department = factory(Department::class)->make()->toArray();
        Passport::actingAs($this->user());

        $response = $this->post('/api/departments', $department);

        $response->assertStatus(201)
            ->assertJsonStructure([
                'id',
                'name',
            ]);

        $this->assertDatabaseHas('departments', $department);
    }
}
