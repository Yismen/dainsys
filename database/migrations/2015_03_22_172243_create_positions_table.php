<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Illuminate\Support\Facades\Schema::create('positions', function (Blueprint $table): void {
            $table->increments('id');
            $table->string('name', 100);
            $table->integer('department_id')->unsigned()->index();
            $table->integer('payment_type_id')->unsigned()->nullable();
            $table->integer('payment_frequency_id')->unsigned()->nullable();
            $table->double('salary', 15, 2);
            $table->timestamps();

            $table->foreign('department_id')->references('id')->on('departments');
            $table->foreign('payment_type_id')->references('id')->on('payment_types');
            $table->foreign('payment_frequency_id')->references('id')->on('payment_frequencies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \Illuminate\Support\Facades\Schema::dropIfExists('positions');
    }
}
