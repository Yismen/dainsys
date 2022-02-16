<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        // DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(MenusTableSeeder::class);
        $this->call(DepartmentsTableSeeder::class);
        $this->call(ProjectsTableSeeder::class);
        $this->call(RevenueTypesTableSeeder::class);
        $this->call(TerminationTypesTableSeeder::class);
        $this->call(TerminationReasonsTableSeeder::class);
        $this->call(SitesTableSeeder::class);
        $this->call(SourcesTableSeeder::class);

        $this->call(GenderTableSeeder::class);
        $this->call(MaritalTableSeeder::class);
        $this->call(NationalityTableSeeder::class);
        $this->call(PaymentFrequencyTableSeeder::class);
        $this->call(PaymentTypeTableSeeder::class);
        // $this->call(PayrollAdditionalConceptTableSeeder::class);
        // $this->call(PayrollDiscountConceptTableSeeder::class);
        // $this->call(PayrollIncentiveTableSeeder::class);

        // DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        Model::reguard();
    }
}
