<?php

namespace Tests\Feature\Departments;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_unuthorized_users_cant_view_department()
    {
        $department = create(\App\Models\Department::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->get(route('admin.departments.index'))
            ->assertForbidden();

        $response->get(route('admin.departments.show', $department->id))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_createt_department()
    {
        $department = create(\App\Models\Department::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->post(route('admin.departments.store'))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_edit_department()
    {
        $department = create(\App\Models\Department::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->put(route('admin.departments.update', $department->id))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_destroy_department()
    {
        $department = create(\App\Models\Department::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->delete(route('admin.departments.destroy', $department->id))
            ->assertForbidden();
    }
}
