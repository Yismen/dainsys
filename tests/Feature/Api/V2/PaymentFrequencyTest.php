<?php

namespace Tests\Feature\Api\V2;

use App\PaymentFrequency;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;
use Tests\TestCase;

class PaymentFrequencyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_validates_request_to_create_payment_frequency()
    {
        Passport::actingAs($this->user());
        $attributes = [
            'name' => '',
        ];

        $response = $this->post('/api/v2/payment_frequencies', $attributes);

        $response->assertInvalid(array_keys($attributes));
    }

    /** @test */
    public function it_creates_a_payment_frequency_and_returns_json()
    {
        $payment_frequency = factory(PaymentFrequency::class)->make()->toArray();
        Passport::actingAs($this->user());

        $response = $this->post('/api/v2/payment_frequencies', $payment_frequency);

        $response->assertStatus(201)
            ->assertJsonStructure([
                'id',
                'name',
            ]);

        $this->assertDatabaseHas('payment_frequencies', $payment_frequency);
    }
}
