<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeStepTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_step', function (Blueprint $table): void {
            $table->integer('employee_id')->unsigned()->index();
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');

            $table->integer('step_id')->unsigned()->index();
            $table->foreign('step_id')->references('id')->on('steps')->onDelete('cascade');
            $table->timestamps();
            // $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_step');
    }
}
