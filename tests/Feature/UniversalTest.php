<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UniversalTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function it_requries_authentication()
    {
        $universal = create('App\Models\Universal');
        $this->get(route('admin.universals.index'))->assertRedirect('/login');
    }

    /** @test */
    public function it_requires_permissions()
    {
        $this->actingAs(create('App\Models\User'));
        $universal = create('App\Models\Universal');

        $response = $this->get('/admin/universals');
        $response->assertStatus(403);
    }

    /** @test */
    public function authorized_users_can_view_universal_resource()
    {
        $user = $this->userWithPermission('view-universals');
        $universal = create('App\Models\Universal');
        $employee = create('App\Models\Employee');
        $this->actingAs($user);

        $universal->employee()->associate($employee);
        $universal->save();

        $response = $this->get('/admin/universals');

        $response->assertOk();
        $response->assertSee('Universal Employees');
        $response->assertSee('Non Universal Employees');
        // $response->assertSee('Add to Universal List');
        // $response->assertSee($universal->employee->full_name);
    }
}
