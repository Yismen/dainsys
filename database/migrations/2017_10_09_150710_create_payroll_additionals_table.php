<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePayrollAdditionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Illuminate\Support\Facades\Schema::create('payroll_additionals', function (Blueprint $table): void {
            $table->increments('id');
            $table->date('date');
            $table->integer('employee_id')->unsigned();
            $table->string('name', 300)->nullable();
            $table->double('additional_amount', 15, 8);
            $table->integer('concept_id')->unsigned();
            $table->string('comment', 200)->nullable();
            $table->timestamps();

            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('concept_id')->references('id')->on('payroll_additional_concepts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \Illuminate\Support\Facades\Schema::drop('payroll_additionals');
    }
}
