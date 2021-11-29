<?php

namespace Tests\Feature\HumanResources;

use App\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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
    public function it_shous_birthdays_for_this_month()
    {
        $employee_with_birthday_this_month = factory(Employee::class)->create(['date_of_birth' => now()]);
        $employee_with_birthday_last_month = factory(Employee::class)->create(['date_of_birth' => now()->subMonth()]);
        $employee_with_birthday_next_month = factory(Employee::class)->create(['date_of_birth' => now()->addMonth()]);
        $this->actingAs($this->userWithPermission('view-human-resources-dashboard'));

        $this->get(route('admin.birthdays_this_month'))
            ->assertOk()
            ->assertSee($employee_with_birthday_this_month->full_name)
            ->assertDontSee($employee_with_birthday_last_month->full_name)
            ->assertDontSee($employee_with_birthday_next_month->full_name);
    }

    /** @test */
    public function it_shous_birthdays_for_last_month()
    {
        $employee_with_birthday_this_month = factory(Employee::class)->create(['date_of_birth' => now()]);
        $employee_with_birthday_last_month = factory(Employee::class)->create(['date_of_birth' => now()->subMonth()]);
        $employee_with_birthday_next_month = factory(Employee::class)->create(['date_of_birth' => now()->addMonth()]);
        $this->actingAs($this->userWithPermission('view-human-resources-dashboard'));

        $this->get(route('admin.birthdays_last_month'))
            ->assertOk()
            ->assertSee($employee_with_birthday_last_month->full_name)
            ->assertDontSee($employee_with_birthday_this_month->full_name)
            ->assertDontSee($employee_with_birthday_next_month->full_name);
    }

    /** @test */
    public function it_shous_birthdays_for_next_month()
    {
        $employee_with_birthday_this_month = factory(Employee::class)->create(['date_of_birth' => now()]);
        $employee_with_birthday_last_month = factory(Employee::class)->create(['date_of_birth' => now()->subMonth()]);
        $employee_with_birthday_next_month = factory(Employee::class)->create(['date_of_birth' => now()->addMonth()]);
        $this->actingAs($this->userWithPermission('view-human-resources-dashboard'));

        $this->get(route('admin.birthdays_next_month'))
            ->assertOk()
            ->assertSee($employee_with_birthday_next_month->full_name)
            ->assertDontSee($employee_with_birthday_this_month->full_name)
            ->assertDontSee($employee_with_birthday_last_month->full_name);
    }
}
