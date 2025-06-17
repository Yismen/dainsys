<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Illuminate\Support\Facades\Schema::create('hours', function (Blueprint $table): void {
            $table->increments('id');
            $table->string('unique_id', 30)->unique();
            $table->integer('employee_id')->unsigned()->index();
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->string('name', 300);
            $table->date('date');
            $table->double('hours', 15, 8)->default(0.00);
            $table->double('nightly', 15, 8)->default(0.00);
            $table->double('holidays', 15, 8)->default(0.00);
            $table->double('training', 15, 8)->default(0.00);
            $table->double('overtime', 15, 8)->default(0.00);
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
        \Illuminate\Support\Facades\Schema::drop('hours');
    }
}
