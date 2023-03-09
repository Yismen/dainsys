<?php

namespace App\Console\Commands;

use App\Models\Employee;
use App\Models\Process;
use Illuminate\Console\Command;

class AutomaticProcessAssignation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dainsys:assign-automatic-processes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $processes = Process::query()
            ->where('default', true)
            ->get();

        foreach ($processes as $process) {
            $employees_id = Employee::query()
                ->whereDoesntHave('processes', function ($query) use ($process) {
                    $query->where('id', $process->id);
                })
                ->pluck('id')->toArray();

            $process->employees()->attach($employees_id);
        }
    }
}
