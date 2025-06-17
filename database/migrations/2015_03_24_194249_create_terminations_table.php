<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTerminationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Illuminate\Support\Facades\Schema::create('terminations', function (Blueprint $table): void {
            $table->increments('id');
            $table->integer('employee_id')->unsigned()->index();
            $table->dateTime('termination_date');
            $table->integer('termination_type_id')->unsigned()->index();
            $table->integer('termination_reason_id')->unsigned()->index();
            $table->boolean('can_be_rehired')->nullable()->default(true);
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
        \Illuminate\Support\Facades\Schema::drop('terminations');
    }
}
