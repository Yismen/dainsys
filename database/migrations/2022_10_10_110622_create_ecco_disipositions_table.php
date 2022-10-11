<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEccoDisipositionsTable extends Migration
{
    public function getConnection()
    {
        return app()->isProduction() ? 'poliscript' : config('database.default') ;
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ecco_dispositions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name', 400)->unique();
            $table->smallInteger('contacts')->unsigned()->default(0);
            $table->smallInteger('sales')->unsigned()->default(0);
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ecco_disipositions');
    }
}
