<?php

namespace Tests\Feature\Position;

use App\Models\Position;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FormValidationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function name_field_is_required()
    {
        $position = create(Position::class)->toArray();

        $this->actingAs($this->userWithPermission('create-positions'))
            ->post(route('admin.positions.store'), array_merge($position, ['name' => '']))
            ->assertSessionHasErrors('name');

        $this->actingAs($this->userWithPermission('edit-positions'))
            ->put(route('admin.positions.update', $position['id']), array_merge($position, ['name' => '']))
            ->assertSessionHasErrors('name');
    }
}
