<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Employee::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName(),
        'second_first_name' => $faker->firstName(),
        'last_name' => $faker->lastName(),
        'second_last_name' => $faker->lastName(),
        'hire_date' => $faker->date(),
        'personal_id' => $faker->unique()->numberBetween(10000000000, 99999999999),
        'passport' => '',
        'date_of_birth' => $faker->date(),
        'cellphone_number' => $faker->unique()->numberBetween(8091000001, 8099999999),
        'secondary_phone' => $faker->email(),
        'position_id' => factory(App\Models\Position::class),
        'site_id' => factory(App\Models\Site::class),
        'project_id' => factory(App\Models\Project::class),
        'supervisor_id' => factory(App\Models\Supervisor::class),
        'gender_id' => factory(App\Models\Gender::class),
        'marital_id' => factory(App\Models\Marital::class),
        'ars_id' => factory(App\Models\Ars::class),
        'afp_id' => factory(App\Models\Afp::class),
        'nationality_id' => factory(App\Models\Nationality::class),
        'has_kids' => $faker->boolean(),
        'photo' => '',
    ];
});
