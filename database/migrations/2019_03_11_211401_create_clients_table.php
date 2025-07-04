<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table): void {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('contact_name', 100);
            $table->string('main_phone', 100);
            $table->string('secondary_phone', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('account_number', 100)->nullable();
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
        Schema::dropIfExists('clients');
    }
}
