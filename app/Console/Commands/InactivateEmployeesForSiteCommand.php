<?php

namespace App\Console\Commands;

use App\Models\Employee;
use App\Models\TerminationReason;
use App\Models\TerminationType;
use Illuminate\Console\Command;

class InactivateEmployeesForSiteCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dainsys:inactivate-employees {site : Site name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Inactivate all active employees for the given site';

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
        $site = $this->argument('site');

        $answer1 = $this->ask("You are about to inactivate all active employees for site {$site}. Are you sure you want to procee? This is a very dangerous action that can't be reversed and should't be performed if you are not entirely sure. Please confirm by typing the word 'yes'");

        $answer2 = $this->ask("Please confirm once again by reponding with word 'yes'");

        if (strtolower($answer1) !== 'yes' || strtolower($answer2) !== 'yes') {
            return $this->warn('Process cancelled');
        }

        $employees = Employee::query()
            ->whereHas('site', function ($query) use ($site) {
                $query->where('name', 'like', $site);
            })
            ->actives()
            ->get();

        if ($employees->count() === 0) {
            return $this->warn("No active employees found for site {$site}");
        }

        $termination_type = TerminationType::first();
        $termination_reason = TerminationReason::first();

        $employees->each->inactivate(
            $date = now(),
            $termination_type,
            $termination_reason,
            $comments = "Terminated with the '\\App\\Console\\Commands\\InactivateEmployeesForSiteCommand'",
        );

        $this->info("Employees for site {$site} have been inactivated!");
    }
}
