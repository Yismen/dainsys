<?php

namespace Tests\Feature\Http\Controllers;

use App\Http\Livewire\Steps;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StepControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guests_can_not_visit_any_steps_route()
    {
        $this->get(route('admin.steps.index'))->assertRedirect('/login');
    }

    /** @test */
    public function it_requires_view_steps_permissions_to_view_all_steps()
    {
        $this->actingAs(create(\App\Models\User::class));

        $response = $this->get('/admin/steps');

        $response->assertStatus(403);
    }

    /** @test */
    // public function it_requires_view_steps_permissions_to_view_a_step_details()
    // {
    //     // given
    //     $step = create('App\Models\Step');
    //     $this->actingAs(create('App\Models\User'));

    //     // when
    //     $response = $this->get("/admin/steps/{$step->id}");

    //     // assert
    //     $response->assertStatus(403);
    // }

    /** @test */
    public function it_allows_users_to_view_steps_if_they_have_view_steps_permission()
    {
        // given
        $user = $this->userWithPermission('view-steps');
        $step = create(\App\Models\Step::class);

        // when
        $this->actingAs($user);
        $response = $this->get('/admin/steps');

        // assert
        // $response->assertSee($step->name);
        $response->assertSeeLivewire(Steps::class);
    }

    /** @test */
    // public function it_allows_users_to_view_a_step_if_they_have_view_steps_permission()
    // {
    //     // given
    //     $user = $this->userWithPermission('view-steps');
    //     $step = create('App\Models\Step');

    //     // when
    //     $this->actingAs($user);
    //     $response = $this->get(route('admin.steps.show', $step->id));

    //     // assert
    //     $response->assertSee($step->name);
    // }
}
