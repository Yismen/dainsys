<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFileNameFieldToPerformancesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('performances', function (Blueprint $table): void {
            $table->string('file_name', 150)->nullable()->after('reported_by')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        if (Schema::hasColumn('performances', 'file_name')) {
            Schema::table('performances', function (Blueprint $table): void {
                $table->dropColumn('file_name');
            });
        }
    }
}
