<?php

namespace Tests\Feature\Employees;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

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

    public function testUnuthorizedUsersCantDestroyEmployee()
    {
        $employee = create('App\Employee');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->delete(route('admin.employees.destroy', $employee->id))
            ->assertForbidden();
    }
}
