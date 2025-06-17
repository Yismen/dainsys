<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePunchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Illuminate\Support\Facades\Schema::create('punches', function (Blueprint $table): void {
            $table->increments('id');
            $table->integer('employee_id')->unsigned()->unique()->index();
            $table->string('punch', 100);
            // $table->integer('number', 100)->unsigned()->unique()->index();
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
        \Illuminate\Support\Facades\Schema::drop('punches');
    }
}
