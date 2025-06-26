<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMaritalsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        \Illuminate\Support\Facades\Schema::create('maritals', function (Blueprint $table): void {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        \Illuminate\Support\Facades\Schema::drop('maritals');
    }
}
