<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('productions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamp('insert_date');
			$table->integer('year')->unsigned();
			$table->integer('month')->unsigned();
			$table->integer('week')->unsigned();
			$table->integer('employee_id')->unsigned()->index();
			$table->string('name', 120);
			$table->double('production_hours', 15, 4)->unsigned();
			$table->integer('production')->unsigned();
			// $table->string('client', 100);
			$table->integer('client_id')->unsigned();
			$table->integer('source_id')->unsigned();

			$table->timestamps();
			
			$table->foreign('employee_id')->references('id')->on('employees');
			$table->foreign('client_id')->references('id')->on('clients');
			$table->foreign('source_id')->references('id')->on('sources');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('productions');
	}

}
