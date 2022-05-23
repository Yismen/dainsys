<?php

use Faker\Generator as Faker;

$factory->define(App\Models\BankAccount::class, function (Faker $faker) {
    return [
        'employee_id' => factory(App\Models\Employee::class),
        'bank_id' => factory(App\Models\Bank::class),
        'account_number' => random_int(1000000001, 9999999999),
    ];
});
