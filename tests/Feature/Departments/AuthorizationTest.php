<?php

namespace Tests\Feature\Departments;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testUnuthorizedUsersCantViewDepartment()
    {
        $department = create('App\Models\Department');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->get(route('admin.departments.index'))
            ->assertForbidden();
        
        $response->get(route('admin.departments.show', $department->id))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantCreatetDepartment()
    {
        $department = create('App\Models\Department');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->post(route('admin.departments.store'))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantEditDepartment()
    {
        $department = create('App\Models\Department');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->put(route('admin.departments.update', $department->id))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantDestroyDepartment()
    {
        $department = create('App\Models\Department');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->delete(route('admin.departments.destroy', $department->id))
            ->assertForbidden();
    }
}
