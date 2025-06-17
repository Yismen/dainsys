<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Illuminate\Support\Facades\Schema::create('cards', function (Blueprint $table): void {
            $table->increments('id');
            $table->integer('employee_id')->unsigned()->unique()->index();
            $table->string('card', 100);
            // $table->integer('number', 10)->unsigned()->unique()->index();
            $table->timestamps();

            $table->foreign('employee_id')->references('id')->on('employees')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \Illuminate\Support\Facades\Schema::drop('cards');
    }
}
