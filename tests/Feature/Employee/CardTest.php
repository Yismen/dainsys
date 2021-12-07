<?php

namespace Tests\Feature\Employee;

use App\Card;
use App\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CardTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function employee_card_is_created()
    {
        $employee = create(Employee::class);
        $card = make(Card::class)->toArray();

        $response = $this
            ->actingAs($this->user())
            ->post(route('admin.employees.update-card', $employee->id), $card);

        $response->assertOk();
        $this->assertDatabaseHas('cards', array_merge($card, ['employee_id' => $employee->id]));
    }

    /** @test */
    public function employee_card_is_updated()
    {
        $card = create(Card::class);
        $updated_attributes = [
            'card' => '99999999',
        ];

        $response = $this
            ->actingAs($this->user())
            ->post(route('admin.employees.update-card', $card->employee->id), $updated_attributes);

        $response->assertOk();
        $this->assertDatabaseHas('cards', $updated_attributes);
    }

    /** @test */
    public function employee_card_data_is_validated()
    {
        $card = create(Card::class);
        $updated_attributes = [
            'card' => '',
        ];

        $response = $this
            ->actingAs($this->user())
            ->post(route('admin.employees.update-card', $card->employee->id), $updated_attributes);

        $response->assertInvalid(['card']);
    }
}
