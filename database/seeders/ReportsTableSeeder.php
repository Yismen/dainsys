<?php

namespace Database\Seeders;

use App\Models\Report;
use Illuminate\Database\Seeder;

class ReportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Report::factory()->create(['name' => 'General RC Production Report', 'key' => 'dainsys:general-rc-production-report']);
        Report::factory()->create(['name' => 'General RC Raw Report', 'key' => 'dainsys:general-rc-raw-report']);
        Report::factory()->create(['name' => 'Publishing Daily Production Report', 'key' => 'publishing:send-production-report']);
        Report::factory()->create(['name' => 'Political Hourly Production Report', 'key' => 'political:send-production-report']);
        Report::factory()->create(['name' => 'Political Daily Text Report', 'key' => 'political:send-text-campaign-report']);
        Report::factory()->create(['name' => 'Kipany Daily Production Report', 'key' => 'inbound:send-daily-summary']);
        Report::factory()->create(['name' => 'Kipany Daily WTD Report', 'key' => 'inbound:send-wtd-summary']);
    }
}
