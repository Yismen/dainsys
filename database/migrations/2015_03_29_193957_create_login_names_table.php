<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoginNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Illuminate\Support\Facades\Schema::create('login_names', function (Blueprint $table): void {
            $table->increments('id');
            $table->integer('employee_id')->unsigned()->index();
            $table->string('login');
            // $table->string('name');
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
        \Illuminate\Support\Facades\Schema::dropIfExists('login_names');
    }
}
