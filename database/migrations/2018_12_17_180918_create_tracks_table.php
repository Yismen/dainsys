<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTracksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tracks', function (Blueprint $table): void {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('trackable_id')->unsigned()->index();
            $table->string('trackable_type', 100);
            $table->string('before', 1000);
            $table->string('after', 1000);
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
        Schema::dropIfExists('tracks');
    }
}
