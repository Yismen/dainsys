<?php

namespace Tests\Feature\Holidays;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_unuthorized_users_cant_view_holiday()
    {
        $holiday = create(\App\Models\Holiday::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->get(route('admin.holidays.index'))
            ->assertForbidden();

        // $response->get(route('admin.holidays.show', $holiday->id))
        //     ->assertForbidden();
    }

    public function test_unuthorized_users_cant_createt_holiday()
    {
        $holiday = create(\App\Models\Holiday::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->get(route('admin.holidays.create'))
            ->assertForbidden();

        $response->post(route('admin.holidays.store'))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_edit_holiday()
    {
        $holiday = create(\App\Models\Holiday::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->get(route('admin.holidays.edit', $holiday->id))
            ->assertForbidden();

        $response->put(route('admin.holidays.update', $holiday->id))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_destroy_holiday()
    {
        $holiday = create(\App\Models\Holiday::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->delete(route('admin.holidays.destroy', $holiday->id))
            ->assertForbidden();
    }
}
