<?php

namespace Tests\Feature\HumanResources;

use App\Models\Employee;
use App\Models\Site;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BirthdaysControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Authentication tests
     */

    /** @test */
    public function guests_can_not_see_birthdays_this_month()
    {
        $this->get(route('admin.birthdays_this_month'))
            ->assertRedirect(route('login'));
    }

    /** @test */
    public function guests_can_not_see_birthdays_last_month()
    {
        $this->get(route('admin.birthdays_last_month'))
            ->assertRedirect(route('login'));
    }

    /** @test */
    public function guests_can_not_see_birthdays_next_month()
    {
        $this->get(route('admin.birthdays_next_month'))
            ->assertRedirect(route('login'));
    }

    /**
     * Authorization tests
     */

    /** @test */
    public function users_without_human_resources_permission_can_not_see_birthdays_this_month()
    {
        $this->actingAs($this->userWithPermission('wrong-permission'));

        $this->get(route('admin.birthdays_this_month'))
            ->assertForbidden();
    }

    /** @test */
    public function users_without_human_resources_permission_can_not_see_birthdays_last_month()
    {
        $this->actingAs($this->userWithPermission('wrong-permission'));

        $this->get(route('admin.birthdays_last_month'))
            ->assertForbidden();
    }

    /** @test */
    public function users_without_human_resources_permission_can_not_see_birthdays_next_month()
    {
        $this->actingAs($this->userWithPermission('wrong-permission'));

        $this->get(route('admin.birthdays_next_month'))
            ->assertForbidden();
    }

    /**
     * Actions tests
     */

    /** @test */
    public function it_shows_birthdays_for_this_month()
    {
        $site = Site::factory()->create(['name' => config('dainsys.limit_queries.sites')[0]]);

        $employee_with_birthday_this_month = Employee::factory()->create([
            'site_id' => $site->id,
            'date_of_birth' => now(),
        ]);
        $employee_with_birthday_last_month = Employee::factory()->create([
            'site_id' => $site->id,
            'date_of_birth' => now()->subMonths(4),
        ]);
        $employee_with_birthday_next_month = Employee::factory()->create([
            'site_id' => $site->id,
            'date_of_birth' => now()->addMonth(),
        ]);
        $this->actingAs($this->userWithPermission('view-human-resources-dashboard'));

        $this->get(route('admin.birthdays_this_month'))
            ->assertOk()
            ->assertSee($employee_with_birthday_this_month->full_name)
            ->assertDontSee($employee_with_birthday_last_month->full_name)
            ->assertDontSee($employee_with_birthday_next_month->full_name);
    }

    /** @test */
    public function it_shows_birthdays_for_last_month()
    {
        $site = Site::factory()->create(['name' => config('dainsys.limit_queries.sites')[0]]);

        $employee_with_birthday_this_month = Employee::factory()->create([
            'site_id' => $site->id,
            'date_of_birth' => now()->startOfMonth(),
        ]);
        $employee_with_birthday_last_month = Employee::factory()->create([
            'site_id' => $site->id,
            'date_of_birth' => now()->startOfMonth()->subMonth(),
        ]);
        $employee_with_birthday_next_month = Employee::factory()->create([
            'site_id' => $site->id,
            'date_of_birth' => now()->startOfMonth()->addMonth(),
        ]);
        $this->actingAs($this->userWithPermission('view-human-resources-dashboard'));

        $this->get(route('admin.birthdays_last_month'))
            ->assertOk()
            ->assertSee($employee_with_birthday_last_month->full_name)
            ->assertDontSee($employee_with_birthday_this_month->full_name)
            ->assertDontSee($employee_with_birthday_next_month->full_name);
    }

    /** @test */
    public function it_shows_birthdays_for_next_month()
    {
        $site = Site::factory()->create(['name' => config('dainsys.limit_queries.sites')[0]]);

        $employee_with_birthday_this_month = Employee::factory()->create([
            'site_id' => $site->id,
            'date_of_birth' => now()->startOfMonth(),
        ]);
        $employee_with_birthday_last_month = Employee::factory()->create([
            'site_id' => $site->id,
            'date_of_birth' => now()->startOfMonth()->subMonths(),
        ]);
        $employee_with_birthday_next_month = Employee::factory()->create([
            'site_id' => $site->id,
            'date_of_birth' => now()->addMonth(),
        ]);
        $this->actingAs($this->userWithPermission('view-human-resources-dashboard'));

        $this->get(route('admin.birthdays_next_month'))
            ->assertOk()
            ->assertSee($employee_with_birthday_next_month->full_name)
            ->assertDontSee($employee_with_birthday_this_month->full_name)
            ->assertDontSee($employee_with_birthday_last_month->full_name);
    }

    /** @test */
    public function birthdays_only_shows_default_sites_when_site_is_not_on_request()
    {
        $site_default = Site::factory()->create(['name' => config('dainsys.limit_queries.sites')[0]]);
        $site_any = Site::factory()->create();

        $employee_for_default_site = Employee::factory()->create([
            'site_id' => $site_default->id,
            'date_of_birth' => now(),
        ]);
        $employee_for_any_site = Employee::factory()->create([
            'site_id' => $site_any->id,
            'date_of_birth' => now(),
        ]);

        $this->actingAs($this->userWithPermission('view-human-resources-dashboard'));

        $response = $this->get(route('admin.birthdays_this_month'));
        $response->assertOk();
        $response->assertSee($employee_for_default_site->full_name);
        $response->assertDontSee($employee_for_any_site->full_name);
    }

    /** @test */
    public function birthdays_shows_all_when_site_is_on_request()
    {
        $site_default = Site::factory()->create(['name' => config('dainsys.limit_queries.sites')[0]]);
        $site_any = Site::factory()->create();

        $employee_for_default_site = Employee::factory()->create([
            'site_id' => $site_default->id,
            'date_of_birth' => now(),
        ]);
        $employee_for_any_site = Employee::factory()->create([
            'site_id' => $site_any->id,
            'date_of_birth' => now(),
        ]);

        $this->actingAs($this->userWithPermission('view-human-resources-dashboard'));

        $response = $this->get(route('admin.birthdays_this_month').'?site=%');
        $response->assertOk();
        $response->assertSee($employee_for_default_site->full_name);
        $response->assertSee($employee_for_any_site->full_name);
    }
}
