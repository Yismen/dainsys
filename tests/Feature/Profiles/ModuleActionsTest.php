<?php

namespace Tests\Feature\Profiles;

use App\Models\Profile;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Arr;

class ModuleActionsTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function it_lists_all_users_assigned_with_profiles()
    {
        $user = $this->userWithPermission('view-profiles');
        $this->be($user);
        $profile = create(Profile::class);

        $this->get(route('admin.profiles.index'))
            ->assertOk()
            ->assertViewIs('profiles.show');
    }

    /** @test */
    public function authorized_users_can_store_profile()
    {
        $profile = make(Profile::class)->toArray();

        $this->actingAs($this->userWithPermission('create-profiles'))
            ->post(route('admin.profiles.store', $profile))
            ->assertRedirect()
            ->assertLocation(route('admin.profiles.index'));

        $this->assertDatabaseHas('profiles', Arr::only($profile, ['bio', 'gender']));
    }

    /** @test */
    public function authorized_users_can_see_edit_page()
    {
        $profile = create(Profile::class);

        $this->actingAs($this->userWithPermission('edit-profiles'))
            ->get(route('admin.profiles.edit', $profile->id))
            ->assertRedirect(route('admin.profiles.index'));
    }

    /** @test */
    public function authorized_users_can_update_profile()
    {
        $profile = create(Profile::class);

        $data_array = [
            'bio' => 'New Biografy',
        ];

        $this->actingAs($this->userWithPermission('edit-profiles'))
            ->put(route('admin.profiles.update', $profile->id), array_merge($profile->toArray(), $data_array))
            ->assertLocation(route('admin.profiles.index'));

        $this->assertDatabaseHas('profiles', $data_array);
    }

    /** @test */
    // public function authorized_users_can_destroy_profile()
    // {
    //     $profile = create(Profile::class);

    //     $this->actingAs($this->userWithPermission('destroy-profiles'))
    //         ->delete(route('admin.profiles.destroy', $profile->id))
    //         ->assertRedirect()
    //         ->assertLocation(route('admin.profiles.index'));

    //     $this->assertDatabaseMissing('profiles', $profile->toArray());
    // }
}
