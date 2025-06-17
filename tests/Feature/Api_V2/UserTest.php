<?php

namespace Tests\Feature\Api_V2;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_returns_a_json_for_current_user()
    {
        Passport::actingAs($this->user());

        $response = $this->get('/api/v2/user');

        $response->assertOk();
    }
}
