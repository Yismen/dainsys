<?php

namespace Tests\Feature\Api;

use App\Employee;
use App\LoginName;
use App\Termination;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;
use Tests\TestCase;

class LoginNamesControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_returns_a_login_names_collection()
    {
        factory(LoginName::class, 3)->create();
        Passport::actingAs($this->user());

        $response = $this->get('/api/performances/login_names');

        $response->assertOk()
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        "employee_id",
                        "employee_name",
                        "login",
                        "supervisor_id",
                    ]
                ]
            ]);
    }

    /** @test */
    public function it_returns_a_login_names_for_recent_employees_only()
    {
        $recent_employee = create(Termination::class, ['termination_date' => now()])->employee;
        $old_employee = create(Termination::class,  ['termination_date' => now()->subYear()])->employee;
        create(LoginName::class, ['employee_id' => $recent_employee->id]);
        create(LoginName::class, ['employee_id' => $old_employee->id]);
        Passport::actingAs($this->user());

        $response = $this->get('/api/performances/login_names?recents=true');

        $response->assertOk()
            ->assertJsonFragment(['employee_name' => $recent_employee->full_name])
            ->assertJsonMissing(['employee_name' => $old_employee->full_name]);
    }
}
