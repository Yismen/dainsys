<?php

namespace Tests\Feature\LoginNames;

use App\LoginName;
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
        $login_name = create(LoginName::class)->toArray();

        $this->actingAs($this->userWithPermission('create-login_names'))
            ->post(route('admin.login_names.store'), array_merge($login_name, ['login' => '']))
            ->assertSessionHasErrors('login');

        $this->actingAs($this->userWithPermission('edit-login_names'))
            ->put(route('admin.login_names.update', $login_name['id']), array_merge($login_name, ['login' => '']))
            ->assertSessionHasErrors('login');
    }
}
