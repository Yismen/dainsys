<?php

namespace Tests\Feature\Users;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FormValidationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function name_field_is_required()
    {
        $user = create(User::class)->toArray();

        $this->actingAs($this->userWithPermission('create-users'))
            ->post(route('admin.users.store'), array_merge($user, ['name' => '']))
            ->assertSessionHasErrors('name');

        $this->actingAs($this->userWithPermission('edit-users'))
            ->put(route('admin.users.update', $user['id']), array_merge($user, ['name' => '']))
            ->assertSessionHasErrors('name');
    }
}
