<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VipTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function it_requries_authentication()
    {
        $vip = create(\App\Models\Vip::class);
        $this->get(route('admin.vips.index'))->assertRedirect('/login');
    }

    /** @test */
    public function it_requires_permissions()
    {
        $this->actingAs(create(\App\Models\User::class));
        $vip = create(\App\Models\Vip::class);

        $response = $this->get('/admin/vips');
        $response->assertStatus(403);
    }

    /** @test */
    public function authorized_users_can_view_vip_resource()
    {
        $user = $this->userWithPermission('view-vips');
        $vip = create(\App\Models\Vip::class);
        $employee = create(\App\Models\Employee::class);
        $this->actingAs($user);

        $vip->employee()->associate($employee);
        $vip->save();

        $response = $this->get('/admin/vips');

        $response->assertOk();
        $response->assertSee('VIP Employees');
        $response->assertSee('Non VIP Employees');
        // $response->assertSee('Add to VIP List');
        // $response->assertSee($vip->employee->full_name);
    }
}
