<?php

namespace Tests\Feature\PaymentFrequencies;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testUnuthorizedUsersCantViewPaymentFrequency()
    {
        $payment_frequency = create('App\Models\PaymentFrequency');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->get(route('admin.payment_frequencies.index'))
            ->assertForbidden();

        $response->get(route('admin.payment_frequencies.show', $payment_frequency->id))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantCreatetPaymentFrequency()
    {
        $payment_frequency = create('App\Models\PaymentFrequency');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->post(route('admin.payment_frequencies.store'))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantEditPaymentFrequency()
    {
        $payment_frequency = create('App\Models\PaymentFrequency');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->put(route('admin.payment_frequencies.update', $payment_frequency->id))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantDestroyPaymentFrequency()
    {
        $payment_frequency = create('App\Models\PaymentFrequency');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->delete(route('admin.payment_frequencies.destroy', $payment_frequency->id))
            ->assertForbidden();
    }
}
