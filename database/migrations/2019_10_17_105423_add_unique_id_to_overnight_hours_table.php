<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUniqueIdToOvernightHoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('overnight_hours', function (Blueprint $table): void {
            $table->string('unique_id', 100)->nullable()->after('hours')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('overnight_hours', 'unique_id')) {
            Schema::table('overnight_hours', function (Blueprint $table): void {
                $table->dropColumn('unique_id');
            });
        }

    }
}
