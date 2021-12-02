<?php

namespace Tests\Feature\Api;

use App\Holiday;
use App\Termination;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;
use Tests\TestCase;

class HolidaysControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_returns_a_holidays_collection()
    {
        factory(Holiday::class, 3)->create(['date' => now()]);
        Passport::actingAs($this->user());

        $response = $this->get('/api/holidays');

        $response->assertOk()
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        "date",
                        "name",
                        "description",
                    ]
                ]
            ]);
    }

    /** @test */
    public function it_includes_holidays_for_a_year_ago()
    {
        $this_year = factory(Holiday::class)->create(['date' => now()]);
        $one_year_ago = factory(Holiday::class)->create(['date' => now()->subYears(1)]);
        Passport::actingAs($this->user());

        $response = $this->get('/api/holidays');

        $response->assertOk()
            ->assertJsonFragment(['name' => $this_year->name, 'date' => $this_year->date->format('Y-m-d')])
            ->assertJsonFragment(['name' => $one_year_ago->name, 'date' => $one_year_ago->date->format('Y-m-d')]);
    }

    /** @test */
    public function it_does_not_includes_holidays_for_two_or_more_years_ago()
    {
        $this_year = factory(Holiday::class)->create(['date' => now()]);
        $two_years_ago = factory(Holiday::class)->create(['date' => now()->subYears(2)]);
        Passport::actingAs($this->user());

        $response = $this->get('/api/holidays');

        $response->assertOk()
            ->assertJsonFragment(['name' => $this_year->name, 'date' => $this_year->date->format('Y-m-d')])
            ->assertJsonMissing(['name' => $two_years_ago->name, 'date' => $two_years_ago->date->format('Y-m-d')]);
    }

    /** @test */
    public function it_includes_holidays_for_future_years()
    {
        $this_year = factory(Holiday::class)->create(['date' => now()]);
        $next_year = factory(Holiday::class)->create(['date' => now()->addYear()]);
        Passport::actingAs($this->user());

        $response = $this->get('/api/holidays');

        $response->assertOk()
            ->assertJsonFragment(['name' => $this_year->name, 'date' => $this_year->date->format('Y-m-d')])
            ->assertJsonFragment(['name' => $next_year->name, 'date' => $next_year->date->format('Y-m-d')]);
    }

    /** @test */
    public function it_retur_holidays_for_a_given_year()
    {
        $this_year = factory(Holiday::class)->create(['date' => now()]);
        $last_year = factory(Holiday::class)->create(['date' => now()->subYear()]);
        $next_year = factory(Holiday::class)->create(['date' => now()->addYear()]);
        Passport::actingAs($this->user());

        $response = $this->get('/api/holidays?year=' . now()->year);

        $response->assertOk()
            ->assertJsonFragment(['name' => $this_year->name, 'date' => $this_year->date->format('Y-m-d')])
            ->assertJsonMissing(['name' => $next_year->name, 'date' => $next_year->date->format('Y-m-d')])
            ->assertJsonMissing(['name' => $last_year->name, 'date' => $last_year->date->format('Y-m-d')]);
    }
}
