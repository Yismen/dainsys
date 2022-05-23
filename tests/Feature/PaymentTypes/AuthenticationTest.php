<?php

namespace Tests\Feature\PaymentTypes;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testGuestCantViewPaymentTypes()
    {
        $payment_type = create('App\Models\PaymentType');

        $this->get(route('admin.payment_types.index'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->get(route('admin.payment_types.show', $payment_type->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function testGuestCantCreatePaymentTypes()
    {
        $payment_type = create('App\Models\PaymentType');

        $this->get(route('admin.payment_types.create'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->post(route('admin.payment_types.store'), $payment_type->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function testGuestCantUpdatePaymentType()
    {
        $payment_type = create('App\Models\PaymentType');

        $this->get(route('admin.payment_types.edit', $payment_type->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->put(route('admin.payment_types.update', $payment_type->id), $payment_type->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function testGuestCantDestroyPaymentType()
    {
        $payment_type = create('App\Models\PaymentType');

        $this->delete(route('admin.payment_types.destroy', $payment_type->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }
}
