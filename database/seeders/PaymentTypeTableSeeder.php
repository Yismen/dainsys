<?php

namespace Database\Seeders;

use App\Models\PaymentType;
use Illuminate\Database\Seeder;

class PaymentTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentType::create([
            'name' => 'By Hours',
            'slug' => 'by-hours',
        ]);

        PaymentType::create([
            'name' => 'Salary',
            'slug' => 'salary',
        ]);

        PaymentType::create([
            'name' => 'By Sales',
            'slug' => 'by-sales',
        ]);
    }
}
