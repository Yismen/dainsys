<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;
use App\Http\Livewire\Processes;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProcessControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guests_can_not_visit_any_processes_route()
    {
        $this->get(route('admin.processes.index'))->assertRedirect('/login');
    }

    /** @test */
    public function it_requires_view_processes_permissions_to_view_all_processes()
    {
        $this->actingAs(create('App\Models\User'));

        $response = $this->get('/admin/processes');

        $response->assertStatus(403);
    }

    /** @test */
    // public function it_requires_view_processes_permissions_to_view_a_process_details()
    // {
    //     // given
    //     $process = create('App\Models\Process');
    //     $this->actingAs(create('App\Models\User'));

    //     // when
    //     $response = $this->get("/admin/processes/{$process->id}");

    //     // assert
    //     $response->assertStatus(403);
    // }

    /** @test */
    public function it_allows_users_to_view_processes_if_they_have_view_processes_permission()
    {
        // given
        $user = $this->userWithPermission('view-processes');
        $process = create('App\Models\Process');

        // when
        $this->actingAs($user);
        $response = $this->get('/admin/processes');

        // assert
        $response->assertSee($process->name);
        $response->assertSeeLivewire(Processes::class);
    }

    /** @test */
    // public function it_allows_users_to_view_a_process_if_they_have_view_processes_permission()
    // {
    //     // given
    //     $user = $this->userWithPermission('view-processes');
    //     $process = create('App\Models\Process');

    //     // when
    //     $this->actingAs($user);
    //     $response = $this->get(route('admin.processes.show', $process->id));

    //     // assert
    //     $response->assertSee($process->name);
    // }
}
