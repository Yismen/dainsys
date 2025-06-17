<?php

namespace Tests\Feature\Departments;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_guest_cant_view_departments()
    {
        $department = create(\App\Models\Department::class);

        $this->get(route('admin.departments.index'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->get(route('admin.departments.show', $department->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_create_departments()
    {
        $department = create(\App\Models\Department::class);

        $this->get(route('admin.departments.create'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->post(route('admin.departments.store'), $department->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_update_department()
    {
        $department = create(\App\Models\Department::class);

        $this->get(route('admin.departments.edit', $department->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->put(route('admin.departments.update', $department->id), $department->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_destroy_department()
    {
        $department = create(\App\Models\Department::class);

        $this->delete(route('admin.departments.destroy', $department->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }
}
