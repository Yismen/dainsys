<?php

namespace Tests\Feature\Api;

use App\Employee;
use App\Termination;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;
use Tests\TestCase;

class EmployeeControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_returns_a_employees_collection()
    {
        factory(Employee::class)->create();
        Passport::actingAs($this->user());

        $response = $this->get('/api/employees');

        $response->assertOk()
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        "id",
                        "first_name",
                        "second_first_name",
                        "last_name",
                        "second_last_name",
                        "full_name",
                        "hire_date",
                        "personal_id",
                        "passport",
                        "date_of_birth",
                        "cellphone_number",
                        "secondary_phone",
                        "site",
                        "project",
                        "position",
                        "salary",
                        "salary_type",
                        "pay_per_hours",
                        "department",
                        "supervisor",
                        "gender",
                        "marital",
                        "ars",
                        "afp",
                        "nationality",
                        "has_kids",
                        "photo",
                        "active",
                        "status",
                        "punch",
                        "account_number",
                        "is_vip",
                        "is_universal",
                        "termination_date",
                    ]
                ]
            ]);
    }

    /** @test */
    public function it_returns_all_employees()
    {
        factory(Employee::class, 5)->create();
        Passport::actingAs($this->user());

        $response = $this->get('/api/employees/all');

        $response->assertOk()
            ->assertJsonCount(5, 'data');
    }

    /** @test */
    public function it_returns_active_employees_only()
    {
        factory(Employee::class, 2)->create();
        factory(Termination::class, 2)->create();
        Passport::actingAs($this->user());

        $response = $this->get('/api/employees/actives');

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

        $response = $this->get('/api/employees/recents');

        $this->assertDatabaseCount('employees', 2);
        $response->assertOk()
            ->assertJsonCount(1, 'data')
            ->assertJsonFragment([
                'first_name' => $recent->first_name,
                'first_name' => $recent->first_name
            ])
            ->assertJsonMissing([
                'first_name' => $not_recent->first_name,
                'last_name' => $not_recent->last_name
            ]);
    }
}
