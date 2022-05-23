<?php

namespace Tests\Feature\Holidays;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testUnuthorizedUsersCantViewHoliday()
    {
        $holiday = create('App\Models\Holiday');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->get(route('admin.holidays.index'))
            ->assertForbidden();

        // $response->get(route('admin.holidays.show', $holiday->id))
        //     ->assertForbidden();
    }

    public function testUnuthorizedUsersCantCreatetHoliday()
    {
        $holiday = create('App\Models\Holiday');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->get(route('admin.holidays.create'))
            ->assertForbidden();

        $response->post(route('admin.holidays.store'))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantEditHoliday()
    {
        $holiday = create('App\Models\Holiday');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->get(route('admin.holidays.edit', $holiday->id))
            ->assertForbidden();

        $response->put(route('admin.holidays.update', $holiday->id))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantDestroyHoliday()
    {
        $holiday = create('App\Models\Holiday');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->delete(route('admin.holidays.destroy', $holiday->id))
            ->assertForbidden();
    }
}
