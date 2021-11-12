<?php

namespace Tests\Feature\Clients;

use App\Client;
use App\ClientCode;
use App\Employee;
use App\Supervisor;
use App\User;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ModuleActionsTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function it_lists_all_users_assigned_with_clients()
    {
        $user = $this->userWithPermission('view-clients');
        $this->be($user);
        $client = create(Client::class);

        $this->get(route('admin.clients.index'))
            ->assertOk()
            ->assertViewIs('clients.index');
    }

    /** @test */
    public function authorized_users_can_store_client()
    {
        $client = make(Client::class)->toArray();

        $this->actingAs($this->userWithPermission('create-clients'))
            ->post(route('admin.clients.store', $client))
            ->assertRedirect()
            ->assertLocation(route('admin.clients.index'));

        $this->assertDatabaseHas('clients', $client);
    }

    /** @test */
    public function authorized_users_can_see_edit_page()
    {
        $client = create(Client::class);

        $this->actingAs($this->userWithPermission('edit-clients'))
            ->get(route('admin.clients.edit', $client->id))
            ->assertOk()
            ->assertViewIs('clients.edit');
    }

    /** @test */
    public function authorized_users_can_update_client()
    {
        $client = create(Client::class);

        $data_array = [
            'name' => 'New Name',
        ];

        $this->actingAs($this->userWithPermission('edit-clients'))
            ->put(route('admin.clients.update', $client->id), array_merge($client->toArray(), $data_array))
            ->assertLocation(route('admin.clients.index'));

        $this->assertDatabaseHas('clients', $data_array);
    }

    /** @test */
    // public function authorized_users_can_destroy_client()
    // {
    //     $client = create(Client::class);

    //     $this->actingAs($this->userWithPermission('destroy-clients'))
    //         ->delete(route('admin.clients.destroy', $client->id))
    //         ->assertRedirect()
    //         ->assertLocation(route('admin.clients.index'));

    //     $this->assertDatabaseMissing('clients', $client->toArray());
    // }
}
