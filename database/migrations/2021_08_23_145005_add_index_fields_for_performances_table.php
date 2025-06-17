<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIndexFieldsForPerformancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // performances
        Schema::table('performances', function (Blueprint $table): void {
            $table->index('name');
            $table->index('date');
        });
        // supervisors
        Schema::table('supervisors', function (Blueprint $table): void {
            $table->index('name');
        });
        // projects
        Schema::table('projects', function (Blueprint $table): void {
            $table->index('name');
        });
        // campaigns
        Schema::table('campaigns', function (Blueprint $table): void {
            $table->index('name');
        });
        // employees
        Schema::table('employees', function (Blueprint $table): void {
            $table->index('first_name');
            $table->index('second_first_name');
            $table->index('last_name');
            $table->index('second_last_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // performances
        Schema::table('performances', function (Blueprint $table): void {
            $table->dropIndex(['name']);
            $table->dropIndex(['date']);
        });
        // supervisors
        Schema::table('supervisors', function (Blueprint $table): void {
            $table->dropIndex(['name']);
        });
        // projects
        Schema::table('projects', function (Blueprint $table): void {
            $table->dropIndex(['name']);
        });
        // campaigns
        Schema::table('campaigns', function (Blueprint $table): void {
            $table->dropIndex(['name']);
        });
        // employees
        Schema::table('employees', function (Blueprint $table): void {
            $table->dropIndex(['first_name']);
            $table->dropIndex(['second_first_name']);
            $table->dropIndex(['last_name']);
            $table->dropIndex(['second_last_name']);
        });
    }
}
