<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOvernightHoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('overnight_hours', function (Blueprint $table): void {
            $table->increments('id');
            $table->date('date');
            $table->integer('employee_id')->unsigned()->index();
            $table->double('hours', 15, 8)->unsigned()->default(0);
            $table->timestamps();

            $table->foreign('employee_id')->references('id')->on('employees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('overnight_hours');
    }
}
