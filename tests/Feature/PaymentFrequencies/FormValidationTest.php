<?php

namespace Tests\Feature\PaymentFrequencies;

use App\Models\PaymentFrequency;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FormValidationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function name_field_is_required()
    {
        $payment_frequency = create(PaymentFrequency::class)->toArray();

        $this->actingAs($this->userWithPermission('create-payment-frequencies'))
            ->post(route('admin.payment_frequencies.store'), array_merge($payment_frequency, ['name' => '']))
            ->assertSessionHasErrors('name');

        $this->actingAs($this->userWithPermission('edit-payment-frequencies'))
            ->put(route('admin.payment_frequencies.update', $payment_frequency['id']), array_merge($payment_frequency, ['name' => '']))
            ->assertSessionHasErrors('name');
    }
}
