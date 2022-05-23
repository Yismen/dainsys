<?php

namespace Tests\Feature\PaymentFrequencies;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testGuestCantViewPaymentFrequencies()
    {
        $payment_frequency = create('App\Models\PaymentFrequency');

        $this->get(route('admin.payment_frequencies.index'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->get(route('admin.payment_frequencies.show', $payment_frequency->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function testGuestCantCreatePaymentFrequencies()
    {
        $payment_frequency = create('App\Models\PaymentFrequency');

        $this->get(route('admin.payment_frequencies.create'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->post(route('admin.payment_frequencies.store'), $payment_frequency->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function testGuestCantUpdatePaymentFrequency()
    {
        $payment_frequency = create('App\Models\PaymentFrequency');

        $this->get(route('admin.payment_frequencies.edit', $payment_frequency->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->put(route('admin.payment_frequencies.update', $payment_frequency->id), $payment_frequency->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function testGuestCantDestroyPaymentFrequency()
    {
        $payment_frequency = create('App\Models\PaymentFrequency');

        $this->delete(route('admin.payment_frequencies.destroy', $payment_frequency->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }
}
