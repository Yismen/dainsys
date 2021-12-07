<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function unauthenticated_users_can_not_see_dashboards()
    {
        $this->get(route('admin.dashboards'))
            ->assertRedirect(route('login'));
    }

    /** @test */
    public function users_without_any_role_are_rendered_with_default_dashboard()
    {
        $this->actingAs($this->user());

        $this->get(route('admin.dashboards'))
            ->assertOk()
            ->assertViewIs('dashboards.default');
    }

    /** @test */
    public function users_without_a_registered_role_are_given_the_default_dashboard()
    {
        $this->actingAs($this->userWithRole('any-role'));

        $this->get(route('admin.dashboards'))
            ->assertOk()
            ->assertViewIs('dashboards.default')
            ->assertViewHas([
                'user',
                'app_name',
                'users_count',
                'employees_count',
                'profiles',
                'sites',
                'projects',
                'birthdays',
            ]);
    }

    /** @test */
    public function owner_users_are_rendered_with_owner_dashboard()
    {
        $this->actingAs($this->userWithRole('owner'));

        $this->get(route('admin.dashboards'))
            ->assertOk()
            ->assertViewIs('dashboards.owner')
            ->assertViewHasAll([
                'sites',
                'projects',
                'departments',
                'employees',
                'revenue_mtd',
                'login_hours_mtd',
                'production_hours_mtd',
                'headcounts',
                'performance',
            ]);
    }

    /** @test */
    public function admin_users_are_rendered_with_admin_dashboard()
    {
        $this->actingAs($this->userWithRole('admin'));

        $this->get(route('admin.dashboards'))
            ->assertOk()
            ->assertViewIs('dashboards.admin')
            ->assertViewHasAll([
                'revenue',
                'revenue_mtd',
                'users',
                'roles',
            ]);
    }

    /** @test */
    public function human_resource_users_are_rendered_with_human_resource_dashboard()
    {
        $this->actingAs($this->userWithRole('human_resource'));

        $this->get(route('admin.dashboards'))
            ->assertOk()
            ->assertViewIs('dashboards.human_resources')
            ->assertViewHasAll([
                'sites',
                'projects',
                'departments',
                'head_count',
                'attrition_mtd',
                'hired_tm',
                'terminated_tm',
                'attrition_monthly',
                'birthdays',
                'headcounts',
                'issues',
            ]);
    }
}
