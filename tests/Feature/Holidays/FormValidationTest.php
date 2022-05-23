<?php

namespace Tests\Feature\Holidays;

use App\Models\Holiday;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FormValidationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function date_field_is_required()
    {
        $holiday = create(Holiday::class)->toArray();

        $this->actingAs($this->userWithPermission('create-holidays'))
            ->post(route('admin.holidays.store'), array_merge($holiday, ['date' => '']))
            ->assertSessionHasErrors('date');

        $this->actingAs($this->userWithPermission('edit-holidays'))
            ->put(route('admin.holidays.update', $holiday['id']), array_merge($holiday, ['date' => '']))
            ->assertSessionHasErrors('date');
    }

    /** @test */
    public function date_field_must_be_a_date()
    {
        $holiday = create(Holiday::class)->toArray();

        $this->actingAs($this->userWithPermission('create-holidays'))
            ->post(route('admin.holidays.store'), array_merge($holiday, ['date' => 'No a valid date']))
            ->assertSessionHasErrors('date');

        $this->actingAs($this->userWithPermission('edit-holidays'))
            ->post(route('admin.holidays.update', $holiday['id']), array_merge($holiday, ['date' => 'No a valid date']))
            ->assertSessionHasErrors('date');
    }

    /** @test */
    public function date_field_must_be_unique()
    {
        $date = Carbon::today();
        $holiday = create(Holiday::class, ['date' => $date])->toArray();

        $this->actingAs($this->userWithPermission('create-holidays'))
            ->post(route('admin.holidays.store'), array_merge($holiday, ['date' => $date]))
            ->assertSessionHasErrors('date');

        $this->actingAs($this->userWithPermission('edit-holidays'))
            ->post(route('admin.holidays.update', $holiday['id']), array_merge($holiday, ['date' => $date]))
            ->assertSessionHasErrors('date');
    }

    /** @test */
    public function name_field_is_required()
    {
        $holiday = create(Holiday::class)->toArray();

        $this->actingAs($this->userWithPermission('create-holidays'))
            ->post(route('admin.holidays.store'), array_merge($holiday, ['name' => '']))
            ->assertSessionHasErrors('name');

        $this->actingAs($this->userWithPermission('edit-holidays'))
            ->put(route('admin.holidays.update', $holiday['id']), array_merge($holiday, ['name' => '']))
            ->assertSessionHasErrors('name');
    }

    /** @test */
    public function name_field_must_have_at_least_4_digits()
    {
        $holiday = create(Holiday::class)->toArray();

        $this->actingAs($this->userWithPermission('create-holidays'))
            ->post(route('admin.holidays.store'), array_merge($holiday, ['name' => 'Aaa']))
            ->assertSessionHasErrors('name');

        $this->actingAs($this->userWithPermission('edit-holidays'))
            ->put(route('admin.holidays.update', $holiday['id']), array_merge($holiday, ['name' => 'Aaa']))
            ->assertSessionHasErrors('name');
    }

    /** @test */
    public function name_field_must_have_a_max_of_150_digits()
    {
        $holiday = create(Holiday::class)->toArray();

        $this->actingAs($this->userWithPermission('create-holidays'))
            ->post(route('admin.holidays.store'), array_merge($holiday, ['name' => $this->faker->words(180)]))
            ->assertSessionHasErrors('name');

        $this->actingAs($this->userWithPermission('edit-holidays'))
            ->put(route('admin.holidays.update', $holiday['id']), array_merge($holiday, ['name' => $this->faker->words(180)]))
            ->assertSessionHasErrors('name');
    }
}
