<?php

namespace Tests\Feature\Departments;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testGuestCantViewDepartments()
    {
        $department = create(\App\Models\Department::class);

        $this->get(route('admin.departments.index'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->get(route('admin.departments.show', $department->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function testGuestCantCreateDepartments()
    {
        $department = create(\App\Models\Department::class);

        $this->get(route('admin.departments.create'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->post(route('admin.departments.store'), $department->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function testGuestCantUpdateDepartment()
    {
        $department = create(\App\Models\Department::class);

        $this->get(route('admin.departments.edit', $department->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->put(route('admin.departments.update', $department->id), $department->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function testGuestCantDestroyDepartment()
    {
        $department = create(\App\Models\Department::class);

        $this->delete(route('admin.departments.destroy', $department->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }
}
