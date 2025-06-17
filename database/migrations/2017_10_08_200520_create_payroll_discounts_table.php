<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayrollDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Illuminate\Support\Facades\Schema::create('payroll_discounts', function (Blueprint $table): void {
            $table->increments('id');
            $table->date('date');
            $table->integer('employee_id')->unsigned();
            $table->string('name', 300)->nullable();
            $table->double('discount_amount', 15, 8);
            $table->integer('concept_id')->unsigned();
            $table->string('comment', 200)->nullable();

            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('concept_id')->references('id')->on('payroll_discount_concepts');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \Illuminate\Support\Facades\Schema::drop('payroll_discounts');
    }
}
