<?php

namespace Tests\Feature\Employees;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

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
}
