<?php

namespace App\Console\Commands;

use App\Exports\EmployeesTerminated as ExportsEmployeesTerminated;

class EmployeesTerminated extends EmployeesAbstractCommand
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
        if ($this->createAndSend(ExportsEmployeesTerminated::class)) {
            $this->info('Employees terminated email sent!');
        } else {
            $this->warn('Nothing to send');
        }
    }
}
