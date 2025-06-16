<?php

namespace Tests\Feature\Http\Livewire;

use Tests\TestCase;
use App\Models\Step;
use Livewire\Livewire;
use App\Http\Livewire\Steps;
use App\Http\Livewire\Search;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StepsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function StepIndexContainsLivewireStepComponent()
    {
        $user = $this->userWithPermission('view-steps');

        $this->actingAs($user);
        $response = $this->get('/admin/steps');

        $response->assertSeeLivewire(Steps::class);
    }

    /** @test */
    public function StepShowsListOfSteps()
    {
        $process = Step::factory()->create();

        Livewire::test(Steps::class)
            ->assertViewIs('livewire.steps')
            ->assertViewHas('steps')
            ->assertViewHas('processes');
    }

    /** @test */
    public function steps_componenet_use_search_component()
    {
        $step1 = Step::factory()->create();

        Livewire::test(Steps::class)
            ->set('process_id', $step1->process_id)
            ->assertSeeLivewire(Search::class);
    }

    /** @test */
    public function StepLimitsBasedOnSearch()
    {
        $steps = Step::factory(3)->create();

        Livewire::test(Steps::class)
            ->emit('searchUpdated', $steps[1]->name)
            ->assertDontSee($steps[0]->name);
    }

    /** @test */
    public function steps_limit_by_process()
    {
        $step1 = Step::factory()->create();
        $step2 = Step::factory()->create();

        Livewire::test(Steps::class)
            ->assertDontSee($step1->name)
            ->assertDontSee($step2->name)
            ->set('process_id', $step1->process_id)
            ->assertSee($step1->name)
            ->assertDontSee($step2->name)
            ->set('process_id', $step2->process_id)
            ->assertSee($step2->name)
            ->assertDontSee($step1->name)
            ;
    }
}
