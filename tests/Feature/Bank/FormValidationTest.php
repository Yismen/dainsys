<?php

namespace Tests\Feature\Banks;

use App\Bank;
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
        $bank = create(Bank::class)->toArray();

        $this->actingAs($this->userWithPermission('create-banks'))
            ->post(route('admin.banks.store'), array_merge($bank, ['name' => '']))
            ->assertSessionHasErrors('name');

        $this->actingAs($this->userWithPermission('edit-banks'))
            ->put(route('admin.banks.update', $bank['id']), array_merge($bank, ['name' => '']))
            ->assertSessionHasErrors('name');
    }
}
