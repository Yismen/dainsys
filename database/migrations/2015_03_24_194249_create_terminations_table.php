<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTerminationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terminations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id')->unsigned()->index();
            $table->dateTime('termination_date');
            $table->integer('termination_type_id')->unsigned()->index();
            $table->integer('termination_reason_id')->unsigned()->index();
            $table->boolean('can_be_rehired')->nullable()->default(false);
            $table->text('comments')->nullable();
            $table->timestamps();

            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('termination_type_id')->references('id')->on('termination_types');
            $table->foreign('termination_reason_id')->references('id')->on('termination_reasons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('terminations');
    }
}
