<?php

namespace Tests\Feature\PaymentTypes;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testUnuthorizedUsersCantViewPaymentType()
    {
        $payment_type = create('App\PaymentType');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->get(route('admin.payment_types.index'))
            ->assertForbidden();

        $response->get(route('admin.payment_types.show', $payment_type->id))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantCreatetPaymentType()
    {
        $payment_type = create('App\PaymentType');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->post(route('admin.payment_types.store'))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantEditPaymentType()
    {
        $payment_type = create('App\PaymentType');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->put(route('admin.payment_types.update', $payment_type->id))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantDestroyPaymentType()
    {
        $payment_type = create('App\PaymentType');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->delete(route('admin.payment_types.destroy', $payment_type->id))
            ->assertForbidden();
    }
}
