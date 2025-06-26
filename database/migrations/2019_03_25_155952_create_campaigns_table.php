<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table): void {
            $table->increments('id');
            $table->string('name', 200);
            $table->integer('project_id')->unsigned();
            $table->integer('source_id')->unsigned();
            $table->integer('revenue_type_id')->unsigned();
            $table->double('sph_goal', 15, 8);
            $table->double('revenue_rate', 15, 8);
            $table->timestamps();

            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->foreign('source_id')->references('id')->on('sources')->onDelete('cascade');
            $table->foreign('revenue_type_id')->references('id')->on('revenue_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campaigns');
    }
}
