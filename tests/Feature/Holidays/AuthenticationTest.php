<?php

namespace Tests\Feature\Holidays;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_guest_cant_view_holidays()
    {
        $holiday = create(\App\Models\Holiday::class);

        $this->get(route('admin.holidays.index'))->assertRedirect('/login');
        // $this->get(route('admin.holidays.show', $holiday->id))->assertRedirect('/login');
    }

    public function test_guest_cant_create_holidays()
    {
        $holiday = create(\App\Models\Holiday::class);

        $this->get(route('admin.holidays.create'))->assertRedirect('/login');
        $this->post(route('admin.holidays.store', $holiday->toArray()))->assertRedirect('/login');
    }

    public function test_guest_cant_edit_holidays()
    {
        $holiday = create(\App\Models\Holiday::class);

        $this->get(route('admin.holidays.edit', $holiday->id))->assertRedirect('/login');
        $this->put(route('admin.holidays.update', $holiday->id))->assertRedirect('/login');
    }

    public function test_guest_cant_destroy_holiday()
    {
        $holiday = create(\App\Models\Holiday::class);

        $this->delete(route('admin.holidays.destroy', $holiday->id))->assertRedirect('/login');
    }
}
