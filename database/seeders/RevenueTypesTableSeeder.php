<?php

namespace Database\Seeders;

use App\RevenueType;
use Illuminate\Database\Seeder;

class RevenueTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RevenueType::create(['name' => 'Sales or Production']);
        RevenueType::create(['name' => 'Production Time']);
        RevenueType::create(['name' => 'Talk Time']);
        RevenueType::create(['name' => 'Login Time']);
        RevenueType::create(['name' => 'Downtime']);
    }
}
