<?php

namespace Tests\Feature\Api;

use App\Nationality;
use App\Vip;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;
use Tests\TestCase;

class NationalityTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_nationality_can_be_created()
    {
        $nationality = make(Nationality::class)->toArray();
        Passport::actingAs($this->userWithPermission('create-nationalities'));

        $response = $this->post('/api/nationalities', $nationality);

        $response->assertRedirect();

        $this->assertDatabaseHas('nationalities', $nationality);
    }
}
