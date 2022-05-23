<?php
namespace Database\Seeders;

use App\Models\PayrollIncentiveConcept;
use Illuminate\Database\Seeder;

class PayrollIncentiveTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PayrollIncentiveConcept::create(['name' => 'Production']);
        PayrollIncentiveConcept::create(['name' => 'Sales']);
    }
}
