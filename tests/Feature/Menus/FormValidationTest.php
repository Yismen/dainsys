<?php

namespace Tests\Feature\Menus;

use App\Menu;
use App\Employee;
use App\User;
use Carbon\Carbon;
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
        $menu = create(Menu::class)->toArray();

        $this->actingAs($this->userWithPermission('create-menus'))
            ->post(route('admin.menus.store'), array_merge($menu, ['name' => '']))
            ->assertSessionHasErrors('name');

        $this->actingAs($this->userWithPermission('edit-menus'))
            ->put(route('admin.menus.update', $menu['id']), array_merge($menu, ['name' => '']))
            ->assertSessionHasErrors('name');
    }
}
