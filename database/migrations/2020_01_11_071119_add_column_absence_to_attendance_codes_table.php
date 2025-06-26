<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnAbsenceToAttendanceCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('attendance_codes', function (Blueprint $table): void {
            $table->boolean('absence')->nullable()->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('attendance_codes', 'absence')) {
            Schema::table('attendance_codes', function (Blueprint $table): void {
                $table->dropColumn('absence');
            });
        }
    }
}
