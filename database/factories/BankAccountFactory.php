<?php

use Faker\Generator as Faker;

$factory->define(App\BankAccount::class, function (Faker $faker) {
    return [
        'employee_id' => factory(App\Employee::class),
        'bank_id' => factory(App\Bank::class),
        'account_number' => random_int(1000000001, 9999999999),
    ];
});
