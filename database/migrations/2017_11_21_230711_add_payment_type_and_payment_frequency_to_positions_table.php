<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPaymentTypeAndPaymentFrequencyToPositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('positions', function (Blueprint $table) {
            if (!Schema::hasColumn('positions', 'payment_type_id')) {
                $table->integer('payment_type_id')->unsigned()->nullable()->after('name');
                // $table->foreign('payment_type_id')->references('id')->on('payment_types');
            }
            if (!Schema::hasColumn('positions', 'payment_frequency_id')) {
                $table->integer('payment_frequency_id')->unsigned()->nullable()->after('name');
                // $table->foreign('payment_frequency_id')->references('id')->on('payment_frequencies');
            }

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('positions', function (Blueprint $table) {
            $table->dropForeign(['payment_type_id']);
            $table->dropForeign(['payment_frequency_id']);

            $table->dropColumn('payment_type_id');
            $table->dropColumn('payment_frequency_id');
        });
    }
}