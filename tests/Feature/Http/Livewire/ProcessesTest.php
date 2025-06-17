<?php

namespace Tests\Feature\Http\Livewire;

use App\Http\Livewire\Processes;
use App\Http\Livewire\Search;
use App\Models\Process;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class ProcessesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function process_index_contains_livewire_process_component()
    {
        $user = $this->userWithPermission('view-processes');

        $this->actingAs($user);
        $response = $this->get('/admin/processes');

        $response->assertSeeLivewire(Processes::class);
    }

    /** @test */
    public function process_shows_list_of_processes()
    {
        $process = Process::factory()->create();

        Livewire::test(Processes::class)
            ->assertViewIs('livewire.processes')
            ->assertViewHas('processes')
            ->assertSee($process->name);
    }

    /** @test */
    public function processes_componenet_use_search_component()
    {
        Livewire::test(Processes::class)
            ->assertSeeLivewire(Search::class);
    }

    /** @test */
    public function process_limits_based_on_search()
    {
        $processes = Process::factory(3)->create();

        Livewire::test(Processes::class)
            ->emit('searchUpdated', $processes[1]->name)
            ->assertDontSee($processes[0]->name);
    }

    /** @test */
    //     public function ProcessesUsePaginationTrait()
    //     {
    //         $processes = factory(Process::class, 15)->create();
    //         $processes2 = factory(Process::class)->create(['name' => 'zzzzz']);

    //         Livewire::test(Processes::class)
    //             ->assertSee($processes[0]->name)
    //             ->assertDontSee($processes2->name);
    //     }
}
