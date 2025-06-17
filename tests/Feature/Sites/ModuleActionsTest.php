<?php

namespace Tests\Feature\Sites;

use App\Models\Site;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ModuleActionsTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function it_lists_all_users_assigned_with_sites()
    {
        $user = $this->userWithPermission('view-sites');
        $this->be($user);
        $site = create(Site::class);

        $this->get(route('admin.sites.index'))
            ->assertOk()
            ->assertViewIs('sites.index');
    }

    /** @test */
    public function authorized_users_can_store_site()
    {
        $site = make(Site::class)->toArray();

        $this->actingAs($this->userWithPermission('create-sites'))
            ->post(route('admin.sites.store'), $site)
            ->assertRedirect()
            ->assertLocation(route('admin.sites.index'));

        $this->assertDatabaseHas('sites', $site);
    }

    /** @test */
    public function authorized_users_can_see_edit_page()
    {
        $site = create(Site::class);

        $this->actingAs($this->userWithPermission('edit-sites'))
            ->get(route('admin.sites.edit', $site->id))
            ->assertOk()
            ->assertViewIs('sites.edit');
    }

    /** @test */
    public function authorized_users_can_update_site()
    {
        $site = create(Site::class);

        $data_array = [
            'name' => 'New Name',
        ];

        $this->actingAs($this->userWithPermission('edit-sites'))
            ->put(route('admin.sites.update', $site->id), array_merge($site->toArray(), $data_array))
            ->assertLocation(route('admin.sites.index'));

        $this->assertDatabaseHas('sites', $data_array);
    }
}
