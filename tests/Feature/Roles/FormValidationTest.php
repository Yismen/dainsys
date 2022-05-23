<?php

namespace Tests\Feature\Roles;

use App\Models\Role;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FormValidationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function name_field_is_required()
    {
        $role = create(Role::class)->toArray();
        $role = array_merge($role, ['name' => '']);

        $this->actingAs($this->userWithPermission('create-roles'))
            ->post(route('admin.roles.store'), $role)
            ->assertSessionHasErrors('name');

        $this->actingAs($this->userWithPermission('edit-roles'))
            ->put(route('admin.roles.update', $role['name']), $role)
            ->assertSessionHasErrors('name');
    }
}
