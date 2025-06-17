<?php

namespace Database\Factories;

use App\Models\User;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Notification>
 */
class NotificationFactory extends \Illuminate\Database\Eloquent\Factories\Factory
{

    protected $model = \App\Models\Notification::class;
    public function definition()
    {
        return [
            'id' => fake()->uuid(),
            'type' => App\Fake\Notification::class,
            'notifiable_type' => User::class,
            'notifiable_id' => User::factory(),
            'data' => json_encode(['foo' => fake()->text()]),
            'read_at' => null,
        ];
    }
}
