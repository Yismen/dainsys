<?php

namespace Tests\Feature\Employees;

use App\Employee;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Arr;

class ModuleActionsTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

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
}
