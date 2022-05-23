<?php

namespace Tests\Feature\Permissions;

use App\Models\Permission;
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
        $permission = create(Permission::class)->toArray();

        $this->actingAs($this->userWithPermission('create-permissions'))
            ->post(route('admin.permissions.store'), array_merge($permission, ['resource' => '']))
            ->assertSessionHasErrors('resource');

        $this->actingAs($this->userWithPermission('edit-permissions'))
            ->put(route('admin.permissions.update', $permission['name']), array_merge($permission, ['name' => '']))
            ->assertSessionHasErrors('name');
    }
}
