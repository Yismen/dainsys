<?php

namespace Tests\Feature;

use App\Employee;
use Tests\TestCase;
use Illuminate\Support\Arr;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmployeesControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    // Authentication Tests
    public function testGuestCantViewEmployees()
    {
        $employee = create('App\Employee');

        $this->get(route('admin.employees.index'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->get(route('admin.employees.show', $employee->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function testGuestCantCreateEmployees()
    {
        $employee = create('App\Employee');

        $this->get(route('admin.employees.create'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->post(route('admin.employees.store'), $employee->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function testGuestCantUpdateEmployee()
    {
        $employee = create('App\Employee');

        $this->get(route('admin.employees.edit', $employee->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->put(route('admin.employees.update', $employee->id), $employee->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    //Authorization Tests
    public function testUnuthorizedUsersCantViewEmployee()
    {
        $employee = create('App\Employee');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->get(route('admin.employees.index'))
            ->assertForbidden();

        $response->get(route('admin.employees.show', $employee->id))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantCreatetEmployee()
    {
        $employee = create('App\Employee');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->post(route('admin.employees.store'))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantEditEmployee()
    {
        $employee = create('App\Employee');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->put(route('admin.employees.update', $employee->id))
            ->assertForbidden();
    }

    // Validation Test
    /** @test */
    public function first_name_field_is_required()
    {
        $employee = create(Employee::class)->toArray();

        $this->actingAs($this->userWithPermission('create-employees'))
            ->post(route('admin.employees.store'), array_merge($employee, ['first_name' => '']))
            ->assertSessionHasErrors('first_name');

        $this->actingAs($this->userWithPermission('edit-employees'))
            ->put(route('admin.employees.update', $employee['id']), array_merge($employee, ['first_name' => '']))
            ->assertSessionHasErrors('first_name');
    }

    // Actions tests
    /** @test */
    public function it_lists_all_users_assigned_with_employees()
    {
        $user = $this->userWithPermission('view-employees');
        $this->be($user);
        $employee = create(Employee::class);

        $this->get(route('admin.employees.index'))
            ->assertOk()
            ->assertViewIs('employees.index');
    }

    /** @test */
    public function authorized_users_can_store_employee()
    {
        $employee = make(Employee::class)->toArray();
        $employee['punch'] = random_int(10001, 99999);

        $response = $this->actingAs($this->userWithPermission('create-employees'))
            ->post(route('admin.employees.store'), $employee)
            ->assertRedirect();

        $this->assertDatabaseHas('employees', Arr::only($employee, ['first_name', 'last_name']));
    }

    /** @test */
    public function authorized_users_can_see_edit_page()
    {
        $employee = create(Employee::class);

        $this->actingAs($this->userWithPermission('edit-employees'))
            ->get(route('admin.employees.edit', $employee->id))
            ->assertOk()
            ->assertViewIs('employees.edit');
    }

    /** @test */
    public function authorized_users_can_update_employee()
    {
        $employee = create(Employee::class);

        $data_array = [
            'first_name' => 'New Name',
        ];

        $this->actingAs($this->userWithPermission('edit-employees'))
            ->put(route('admin.employees.update', $employee->id), array_merge($employee->toArray(), $data_array))
            ->assertLocation(route('admin.employees.edit', $employee->id));

        $this->assertDatabaseHas('employees', $data_array);
    }

    /** @test */
    public function authorized_users_can_view_employee()
    {
        $employee = create(Employee::class);

        $response = $this->actingAs($this->userWithPermission('view-employees'))
            ->get(route('admin.employees.show', $employee->id));

        $response->assertViewIs('employees.show');
        $response->assertViewHas('employee');
        $response->assertViewHas('previous_terminations');
        $response->assertViewHas('employee.changes');
        $response->assertViewHas('employee.site');
    }
}
