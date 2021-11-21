<?php

namespace Tests\Feature\Api;

use App\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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

        $response = $this->json('GET', '/api/employees');

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
}
