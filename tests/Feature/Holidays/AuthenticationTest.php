<?php

namespace Tests\Feature\Holidays;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testGuestCantViewHolidays()
    {
        $holiday = create('App\Models\Holiday');

        $this->get(route('admin.holidays.index'))->assertRedirect('/login');
        // $this->get(route('admin.holidays.show', $holiday->id))->assertRedirect('/login');
    }

    public function testGuestCantCreateHolidays()
    {
        $holiday = create('App\Models\Holiday');

        $this->get(route('admin.holidays.create'))->assertRedirect('/login');
        $this->post(route('admin.holidays.store', $holiday->toArray()))->assertRedirect('/login');
    }

    public function testGuestCantEditHolidays()
    {
        $holiday = create('App\Models\Holiday');

        $this->get(route('admin.holidays.edit', $holiday->id))->assertRedirect('/login');
        $this->put(route('admin.holidays.update', $holiday->id))->assertRedirect('/login');
    }

    public function testGuestCantDestroyHoliday()
    {
        $holiday = create('App\Models\Holiday');

        $this->delete(route('admin.holidays.destroy', $holiday->id))->assertRedirect('/login');
    }
}
