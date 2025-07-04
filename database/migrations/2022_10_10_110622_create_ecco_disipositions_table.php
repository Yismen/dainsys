<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEccoDisipositionsTable extends Migration
{
    public function getConnection()
    {
        return app()->isProduction() ? 'poliscript' : config('database.default');
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! Schema::hasTable('ecco_dispositions')) {
            Schema::create('ecco_dispositions', function (Blueprint $table): void {
                $table->id();
                $table->timestamps();
                $table->string('name', 400)->unique();
                $table->smallInteger('contacts')->unsigned()->default(0);
                $table->smallInteger('sales')->unsigned()->default(0);
                $table->smallInteger('upsales')->unsigned()->default(0);
                $table->smallInteger('cc_sales')->unsigned()->default(0);
                $table->softDeletes();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (app()->isProduction() == false) {
            Schema::dropIfExists('ecco_disipositions');
        }
    }
}
