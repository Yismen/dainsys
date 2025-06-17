<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;
use App\Models\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmployeesControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guests_can_not_visit_any_employees_route()
    {
        $this->get(route('admin.employees.index'))->assertRedirect('/login');
    }

    /** @test */
    public function it_requires_view_employees_permissions_to_view_all_employees()
    {
        $this->actingAs(create(\App\Models\User::class));

        $response = $this->get('/admin/employees');

        $response->assertStatus(403);
    }

    /** @test */
    // public function it_requires_view_employees_permissions_to_view_a_employee_details()
    // {
    //     // given
    //     $employee = create('App\Models\Employee');
    //     $this->actingAs(create('App\Models\User'));

    //     // when
    //     $response = $this->get("/admin/employees/{$employee->id}");

    //     // assert
    //     $response->assertStatus(403);
    // }

    /** @test */
    public function it_allows_users_to_view_employees_if_they_have_view_employees_permission()
    {
        // given
        $user = $this->userWithPermission('view-employees');
        $employee = create(\App\Models\Employee::class);

        // when
        $this->actingAs($user);
        $response = $this->get('/admin/employees');

        // assert
        $response->assertOk();
    }

    /** @test */
    // public function it_allows_users_to_view_a_employee_if_they_have_view_employees_permission()
    // {
    //     // given
    //     $user = $this->userWithPermission('view-employees');
    //     $employee = create('App\Models\Employee');

    //     // when
    //     $this->actingAs($user);
    //     $response = $this->get(route('admin.employees.show', $employee->id));

    //     // assert
    //     $response->assertSee($employee->name);
    // }
}
