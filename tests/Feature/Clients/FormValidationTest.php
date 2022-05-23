<?php

namespace Tests\Feature\Clients;

use App\Models\Client;
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
        $client = create(Client::class)->toArray();

        $this->actingAs($this->userWithPermission('create-clients'))
            ->post(route('admin.clients.store'), array_merge($client, ['name' => '']))
            ->assertSessionHasErrors('name');

        $this->actingAs($this->userWithPermission('edit-clients'))
            ->put(route('admin.clients.update', $client['id']), array_merge($client, ['name' => '']))
            ->assertSessionHasErrors('name');
    }
}
