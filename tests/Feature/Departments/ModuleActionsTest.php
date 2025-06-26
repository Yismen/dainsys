<?php

namespace Tests\Feature\Departments;

use App\Models\Department;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ModuleActionsTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function it_lists_all_users_assigned_with_departments()
    {
        $user = $this->userWithPermission('view-departments');
        $this->be($user);
        $department = create(Department::class);

        $this->get(route('admin.departments.index'))
            ->assertOk()
            ->assertViewIs('departments.index');
    }

    /** @test */
    public function authorized_users_can_store_department()
    {
        $department = make(Department::class)->toArray();

        $this->actingAs($this->userWithPermission('create-departments'))
            ->post(route('admin.departments.store'), $department)
            ->assertRedirect()
            ->assertLocation(route('admin.departments.index'));

        $this->assertDatabaseHas('departments', $department);
    }

    /** @test */
    public function authorized_users_can_see_edit_page()
    {
        $department = create(Department::class);

        $this->actingAs($this->userWithPermission('edit-departments'))
            ->get(route('admin.departments.edit', $department->id))
            ->assertOk()
            ->assertViewIs('departments.edit');
    }

    /** @test */
    public function authorized_users_can_update_department()
    {
        $department = create(Department::class);

        $data_array = [
            'name' => 'New Name',
        ];

        $this->actingAs($this->userWithPermission('edit-departments'))
            ->put(route('admin.departments.update', $department->id), array_merge($department->toArray(), $data_array))
            ->assertLocation(route('admin.departments.edit', $department->id));

        $this->assertDatabaseHas('departments', $data_array);
    }

    /** @test */
    public function authorized_users_can_destroy_department()
    {
        $department = create(Department::class);

        $this->actingAs($this->userWithPermission('destroy-departments'))
            ->delete(route('admin.departments.destroy', $department->id))
            ->assertRedirect()
            ->assertLocation(route('admin.departments.index'));

        $this->assertDatabaseMissing('departments', $department->toArray());
    }
}
