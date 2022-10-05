<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Termination::class, function (Faker $faker) {
    return [
        'employee_id' => factory(App\Models\Employee::class),
        'termination_date' => $faker->date(),
        'termination_type_id' => factory(App\Models\TerminationType::class),
        'termination_reason_id' => factory(App\Models\TerminationReason::class),
        'can_be_rehired' => $faker->randomElement([true, false]),
        'comments' => $faker->realText(),
    ];
});
