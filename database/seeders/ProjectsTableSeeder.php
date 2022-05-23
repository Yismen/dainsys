<?php
namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::create(['name' => 'Administracion']);
        Project::create(['name' => 'ATT']);
        Project::create(['name' => 'Banca']);
        Project::create(['name' => 'Banca Internacional']);
        Project::create(['name' => 'Blackhawk CS']);
        Project::create(['name' => 'Blackhawk DE']);
        Project::create(['name' => 'Comcast']);
        Project::create(['name' => 'Publishing']);
        Project::create(['name' => 'TMC - Direct Energy']);
        Project::create(['name' => 'Workforce']);
        Project::create(['name' => 'TMC - Spark Energy']);
        Project::create(['name' => 'TMC - Political']);
    }
}
