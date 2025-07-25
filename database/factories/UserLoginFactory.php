<?php

namespace Database\Factories;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use App\Models\UserLogin;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserLogin>
 */
class UserLoginFactory extends \Illuminate\Database\Eloquent\Factories\Factory
{
    protected $model = UserLogin::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'logged_in_at' => now(),
            'logged_out_at' => now(),
        ];
    }
}
