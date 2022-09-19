<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\EmployeesHiredMail;
use Illuminate\Support\Facades\Mail;

class EmployeesHired extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dainsys:employees-hired {dates} {--site=%}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send an email with all the employees hired since the given month';

    /**
     * Create a new command instance.
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
        $dates = $this->argument('dates');

        Mail::send(new EmployeesHiredMail($this->name, $dates, $this->option('site')));

        $this->info('Employees hired email sent!');
    }
}
