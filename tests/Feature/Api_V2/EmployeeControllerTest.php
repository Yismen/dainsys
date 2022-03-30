<?php

namespace Tests\Feature\Api_V2;

use App\Site;
use App\Project;
use App\Employee;
use App\Department;
use Tests\TestCase;
use App\Termination;
use Laravel\Passport\Passport;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmployeeControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_returns_a_employees_collection()
    {
        factory(Employee::class)->create();
        Passport::actingAs($this->user());

        $response = $this->get('/api/v2/employees');

        $response->assertOk()
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'first_name',
                        'second_first_name',
                        'last_name',
                        'second_last_name',
                        'full_name',
                        'hire_date',
                        'personal_id',
                        'passport',
                        'date_of_birth',
                        'cellphone_number',
                        'secondary_phone',
                        'site',
                        'project',
                        'position',
                        'salary',
                        'salary_type',
                        'pay_per_hours',
                        'department',
                        'supervisor',
                        'gender',
                        'marital',
                        'ars',
                        'afp',
                        'nationality',
                        'has_kids',
                        'photo',
                        'active',
                        'status',
                        'punch',
                        'account_number',
                        'is_vip',
                        'is_universal',
                        'termination_date',
                    ],
                ],
            ]);
    }

    /** @test */
    public function it_returns_all_employees()
    {
        factory(Employee::class, 5)->create();
        Passport::actingAs($this->user());

        $response = $this->get('/api/v2/employees/all');

        $response->assertOk()
            ->assertJsonCount(5, 'data');
    }

    /** @test */
    public function it_returns_active_employees_only()
    {
        factory(Employee::class, 2)->create();
        factory(Termination::class, 2)->create();
        Passport::actingAs($this->user());

        $response = $this->get('/api/v2/employees/actives');

        $this->assertDatabaseCount('employees', 4);

        $response->assertOk()
            ->assertJsonCount(2, 'data');
    }

    /** @test */
    public function it_returns_recent_employees_only()
    {
        $recent = factory(Employee::class)->create(['hire_date' => now()]);
        $not_recent = factory(Termination::class)
            ->create()
            ->employee;
        $not_recent->update(['hire_date' => now()->subYears(5)]);
        Passport::actingAs($this->user());

        $response = $this->get('/api/v2/employees/recents');

        $this->assertDatabaseCount('employees', 2);
        $response->assertOk()
            ->assertJsonCount(1, 'data')
            ->assertJsonFragment([
                'first_name' => $recent->first_name,
                'first_name' => $recent->first_name,
            ])
            ->assertJsonMissing([
                'first_name' => $not_recent->first_name,
                'last_name' => $not_recent->last_name,
            ]);
    }

    /** @test */
    public function employees_are_filterable_by_site()
    {
        Passport::actingAs($this->user());
        $site = factory(Site::class)->create();
        $employee_site_1 = factory(Employee::class)->create([
            'hire_date' => now(),
            'site_id' => $site->id
        ]);
        $employee_site_2 = factory(Employee::class)->create([
            'hire_date' => now()
        ]);

        $response = $this->get("/api/v2/employees?site={$site->name}");

        $response->assertOk();
        $response->assertJsonFragment([
            'first_name' => $employee_site_1->first_name,
            'last_name' => $employee_site_1->last_name,
        ]);
        $response->assertJsonMissing([
            'first_name' => $employee_site_2->first_name,
            'last_name' => $employee_site_2->last_name,
        ]);
        $response->assertJsonCount(1, 'data');
    }

    /** @test */
    public function employees_are_filterable_by_project()
    {
        Passport::actingAs($this->user());
        $project = factory(Project::class)->create();
        $employee_project_1 = factory(Employee::class)->create([
            'hire_date' => now(),
            'project_id' => $project->id
        ]);
        $employee_project_2 = factory(Employee::class)->create([
            'hire_date' => now()
        ]);

        $response = $this->get("/api/v2/employees?project={$project->name}");

        $response->assertOk();
        $response->assertJsonFragment([
            'first_name' => $employee_project_1->first_name,
            'last_name' => $employee_project_1->last_name,
        ]);
        $response->assertJsonMissing([
            'first_name' => $employee_project_2->first_name,
            'last_name' => $employee_project_2->last_name,
        ]);
        $response->assertJsonCount(1, 'data');
    }

    /** @test */
    public function employees_are_filterable_by_department()
    {
        Passport::actingAs($this->user());
        $employee_department_1 = factory(Employee::class)->create([
            'hire_date' => now(),
        ])->load('position.department');
        $employee_department_2 = factory(Employee::class)->create([
            'hire_date' => now()
        ]);
        $response = $this->get("/api/v2/employees?department={$employee_department_1->position->department->name}");
        
        $response->assertOk();
        $response->assertJsonFragment([
            'first_name' => $employee_department_1->first_name,
            'last_name' => $employee_department_1->last_name,
        ]);
        $response->assertJsonMissing([
            'first_name' => $employee_department_2->first_name,
            'last_name' => $employee_department_2->last_name,
        ]);
        $response->assertJsonCount(1, 'data');
    }

    /** @test */
    public function employees_are_filterable_by_position()
    {
        Passport::actingAs($this->user());
        $employee_position_1 = factory(Employee::class)->create([
            'hire_date' => now(),
        ])->load('position');
        $employee_position_2 = factory(Employee::class)->create([
            'hire_date' => now()
        ]);
        $response = $this->get("/api/v2/employees?position={$employee_position_1->position->name}");
        
        $response->assertOk();
        $response->assertJsonFragment([
            'first_name' => $employee_position_1->first_name,
            'last_name' => $employee_position_1->last_name,
        ]);
        $response->assertJsonMissing([
            'first_name' => $employee_position_2->first_name,
            'last_name' => $employee_position_2->last_name,
        ]);
        $response->assertJsonCount(1, 'data');
    }
}
