<?php

namespace Tests\Feature\Profiles;

use App\Models\Profile;
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
        $profile = create(Profile::class)->toArray();

        $this->actingAs($this->userWithPermission('create-profiles'))
            ->post(route('admin.profiles.store'), array_merge($profile, ['name' => '']))
            ->assertSessionHasErrors('name');

        $this->actingAs($this->userWithPermission('edit-profiles'))
            ->put(route('admin.profiles.update', $profile['id']), array_merge($profile, ['name' => '']))
            ->assertSessionHasErrors('name');
    }
}
