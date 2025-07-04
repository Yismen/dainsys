<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOutboundMinutesToCapillusDailyPerformancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('capillus_daily_performances', function (Blueprint $table): void {
            $table->double('outbound_minutes', 15, 8)->nullable()->default(0)->after('inbound_minutes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('capillus_daily_performances', 'outbound_minutes')) {
            Schema::table('capillus_daily_performances', function (Blueprint $table): void {
                $table->dropColumn('outbound_minutes');
            });
        }
    }
}
