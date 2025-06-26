<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContactValidationsTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function it_requires_a_name_to_create_a_contact()
    {
        $this->actingAs(create(\App\Models\User::class))
            ->post(route('admin.contacts.store'), $this->formAttributes(['name' => '']))
            ->assertSessionHasErrors('name');
    }

    /** @test */
    public function it_requires_a_phone_to_create_a_contact()
    {
        $this->actingAs(create(\App\Models\User::class))
            ->post(route('admin.contacts.store'), $this->formAttributes(['phone' => '']))
            ->assertSessionHasErrors('phone');
    }

    /** @test */
    public function it_requires_a_formated_correctly_to_create_a_contact()
    {
        $this->actingAs(create(\App\Models\User::class))
            ->post(route('admin.contacts.store'), $this->formAttributes(['email' => '']))
            ->assertSessionHasErrors('email');
    }

    protected function formAttributes($array = [])
    {
        return array_merge([
            'name' => $this->faker->name,
            'phone' => $this->faker->phoneNumber,
            'works_at' => $this->faker->company,
            'position' => $this->faker->company,
            'secondary_phone' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
        ], $array);
    }
}
