<?php

namespace Tests\Feature\Nationalities;

use App\Nationality;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ModuleActionsTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function it_lists_all_users_assigned_with_nationalities()
    {
        $user = $this->userWithPermission('view-nationalities');
        $this->be($user);
        $nationality = create(Nationality::class);

        $this->get(route('admin.nationalities.index'))
            ->assertOk()
            ->assertViewIs('nationalities.index');
    }

    /** @test */
    public function authorized_users_can_store_nationality()
    {
        $nationality = make(Nationality::class)->toArray();

        $this->actingAs($this->userWithPermission('create-nationalities'))
            ->post(route('admin.nationalities.store', $nationality))
            ->assertRedirect()
            ->assertLocation(route('admin.nationalities.index'));

        $this->assertDatabaseHas('nationalities', $nationality);
    }

    /** @test */
    public function authorized_users_can_see_edit_page()
    {
        $nationality = create(Nationality::class);

        $this->actingAs($this->userWithPermission('edit-nationalities'))
            ->get(route('admin.nationalities.edit', $nationality->id))
            ->assertOk()
            ->assertViewIs('nationalities.edit');
    }

    /** @test */
    public function authorized_users_can_update_nationality()
    {
        $nationality = create(Nationality::class);

        $data_array = [
            'name' => 'New Name',
        ];

        $this->actingAs($this->userWithPermission('edit-nationalities'))
            ->put(route('admin.nationalities.update', $nationality->id), array_merge($nationality->toArray(), $data_array))
            ->assertLocation(route('admin.nationalities.index'));

        $this->assertDatabaseHas('nationalities', $data_array);
    }

    /** @test */
    public function authorized_users_can_destroy_nationality()
    {
        $nationality = create(Nationality::class);

        $this->actingAs($this->userWithPermission('destroy-nationalities'))
            ->delete(route('admin.nationalities.destroy', $nationality->id))
            ->assertRedirect()
            ->assertLocation(route('admin.nationalities.index'));

        $this->assertDatabaseMissing('nationalities', $nationality->toArray());
    }
}
