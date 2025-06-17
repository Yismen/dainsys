<?php

namespace Database\Factories;

use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BankAccount>
 */
class BankAccountFactory extends \Illuminate\Database\Eloquent\Factories\Factory
{

    protected $model = \App\Models\BankAccount::class;
    public function definition()
    {
        return [
            'employee_id' => \App\Models\Employee::factory(),
            'bank_id' => \App\Models\Bank::factory(),
            'account_number' => random_int(1000000001, 9999999999),
        ];
    }
}
