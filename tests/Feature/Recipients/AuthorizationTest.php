<?php

namespace Tests\Feature\Recipients;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testUnuthorizedUsersCantViewRecipient()
    {
        $recipient = create('App\Models\Recipient');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->get(route('admin.recipients.index'))
            ->assertForbidden();

        $response->get(route('admin.recipients.show', $recipient->id))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantCreatetRecipient()
    {
        $recipient = create('App\Models\Recipient');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->post(route('admin.recipients.store'))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantEditRecipient()
    {
        $recipient = create('App\Models\Recipient');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->put(route('admin.recipients.update', $recipient->id))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantDestroyRecipient()
    {
        $recipient = create('App\Models\Recipient');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->delete(route('admin.recipients.destroy', $recipient->id))
            ->assertForbidden();
    }
}
