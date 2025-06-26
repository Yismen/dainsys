<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSluggableFieldToPunchesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('punches', function (Blueprint $table): void {
            $table->string('slug', 100)->nullable()->after('employee_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        if (Schema::hasColumn('punches', 'slug')) {
            Schema::table('punches', function (Blueprint $table): void {
                $table->dropColumn('slug');
            });
        }
    }
}
