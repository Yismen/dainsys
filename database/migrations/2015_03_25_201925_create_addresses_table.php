<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Illuminate\Support\Facades\Schema::create('addresses', function (Blueprint $table): void {
            $table->increments('id');
            $table->integer('employee_id')->unsigned()->index();
            $table->string('sector', 100);
            $table->string('street_address', 150);
            $table->string('city', 100);
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
        \Illuminate\Support\Facades\Schema::drop('addresses');
    }
}
