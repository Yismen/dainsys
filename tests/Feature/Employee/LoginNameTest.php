<?php

namespace Tests\Feature\Employee;

use App\LoginName;
use App\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginNameTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function employee_login_name_is_created()
    {
        $employee = create(Employee::class);
        $login_name = make(LoginName::class)->toArray();

        $response = $this
            ->actingAs($this->user())
            ->post(route('admin.employees.login.create', $employee->id), $login_name);
        $response->assertOk();
        $this->assertDatabaseHas('login_names', array_merge($login_name, ['employee_id' => $employee->id]));
    }

    /** @test */
    public function employee_login_name_data_is_validated()
    {
        $login_name = create(LoginName::class);
        $updated_attributes = [
            'login' => '',
        ];

        $response = $this
            ->actingAs($this->user())
            ->post(route('admin.employees.login.create', $login_name->employee->id), $updated_attributes);

        $response->assertInvalid(['login']);
    }
}
