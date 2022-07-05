<?php

namespace Tests\Feature\Http\Livewire;

use Tests\TestCase;
use Livewire\Livewire;
use App\Http\Livewire\Search;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SearchTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_emits_search_updated_event()
    {
        Livewire::test(Search::class)
            ->updateProperty('search', 'new')
            ->assertEmitted('searchUpdated', 'new');
    }

    /** @test */
    public function it_hides_close_button_if_search_is_null()
    {
        Livewire::test(Search::class)
            ->set('search', '')
            ->assertDontSeeHtml('input-group-btn');
    }

    /** @test */
    public function it_shows_close_button_if_search_is_not_null()
    {
        Livewire::test(Search::class)
            ->set('search', 'some')
            ->assertSeeHtml('input-group-btn');
    }
}
