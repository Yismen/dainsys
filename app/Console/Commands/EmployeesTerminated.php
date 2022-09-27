<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmployeesTerminatedMail;

class EmployeesTerminated extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dainsys:employees-terminated {dates} {--site=%}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send an email with all the employees terminated in a given period!';

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

        Mail::send(new EmployeesTerminatedMail($this->name, $dates, $this->option('site')));

        $this->info('Employees terminated email sent!');
    }
}
