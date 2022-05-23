<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContactTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function users_can_see_their_contacts()
    {
        $user = create('App\Models\User');
        $contact = $user->contacts()->create(
            factory('App\Models\Contact')->raw()
        );

        $this->actingAs($user);

        $this->get(route('admin.contacts.index'))
            ->assertSee($contact->name);
    }

    /** @test */
    public function users_cant_see_contacts_created_by_another_user()
    {
        $user = create('App\Models\User');
        $contact = $user->contacts()->create(
            factory('App\Models\Contact')->raw()
        );

        $this->actingAs(create('App\Models\User'));

        $this->get(route('admin.contacts.index'))
            ->assertDontSee(e($contact->name));
    }

    /** @test */
    public function a_user_can_see_details_of_an_owned_contact()
    {
        $user = create('App\Models\User');
        $contact = $user->contacts()->create(
            factory('App\Models\Contact')->raw()
        );

        $this->actingAs($user);

        $this->get(route('admin.contacts.show', $contact->id))
            ->assertSee($contact->name);
    }

    /** @test */
    public function users_cant_see_details_of_not_owned_contacts()
    {
        $user = create('App\Models\User');
        $contact = $user->contacts()->create(
            factory('App\Models\Contact')->raw()
        );

        $this->actingAs(create('App\Models\User'));

        $this->get(route('admin.contacts.show', $contact->id))
            ->assertStatus(404);
    }
}
