<?php

namespace Tests\Feature\Menus;

use App\Models\Menu;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FormValidationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function name_field_is_required()
    {
        $menu = create(Menu::class)->toArray();

        $this->actingAs($this->userWithPermission('create-menus'))
            ->post(route('admin.menus.store'), array_merge($menu, ['name' => '']))
            ->assertSessionHasErrors('name');

        $this->actingAs($this->userWithPermission('edit-menus'))
            ->put(route('admin.menus.update', $menu['id']), array_merge($menu, ['name' => '']))
            ->assertSessionHasErrors('name');
    }
}
