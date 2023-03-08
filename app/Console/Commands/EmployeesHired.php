<?php

namespace App\Console\Commands;

use App\Exports\EmployeesHired as ExportsEmployeesHired;

class EmployeesHired extends EmployeesAbstractCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dainsys:employees-hired 
                                                    {dates : Default is yesterday\'s date. You can pass multiple dates divided by (,|).} 
                                                    {--site=%}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send an email with all the employees hired in a given period!';

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
        if ($this->createAndSend(ExportsEmployeesHired::class)) {
            $this->info('Employees hired email sent!');
        } else {
            $this->warn('Nothing to send');
        }
    }
}
