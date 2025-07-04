<?php

namespace Tests\Feature\RevenueTypes;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_guest_cant_view_revenue_types()
    {
        $revenue_type = create(\App\Models\RevenueType::class);

        $this->get(route('admin.revenue_types.index'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->get(route('admin.revenue_types.show', $revenue_type->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_create_revenue_types()
    {
        $revenue_type = create(\App\Models\RevenueType::class);

        $this->get(route('admin.revenue_types.create'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->post(route('admin.revenue_types.store'), $revenue_type->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_update_revenue_type()
    {
        $revenue_type = create(\App\Models\RevenueType::class);

        $this->get(route('admin.revenue_types.edit', $revenue_type->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->put(route('admin.revenue_types.update', $revenue_type->id), $revenue_type->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_destroy_revenue_type()
    {
        $revenue_type = create(\App\Models\RevenueType::class);

        $this->delete(route('admin.revenue_types.destroy', $revenue_type->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }
}
