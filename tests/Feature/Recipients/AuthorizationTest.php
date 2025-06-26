<?php

namespace Tests\Feature\Recipients;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_unuthorized_users_cant_view_recipient()
    {
        $recipient = create(\App\Models\Recipient::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->get(route('admin.recipients.index'))
            ->assertForbidden();

        $response->get(route('admin.recipients.show', $recipient->id))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_createt_recipient()
    {
        $recipient = create(\App\Models\Recipient::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->post(route('admin.recipients.store'))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_edit_recipient()
    {
        $recipient = create(\App\Models\Recipient::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->put(route('admin.recipients.update', $recipient->id))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_destroy_recipient()
    {
        $recipient = create(\App\Models\Recipient::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->delete(route('admin.recipients.destroy', $recipient->id))
            ->assertForbidden();
    }
}
