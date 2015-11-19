<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatDirDestinoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dirDestino', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('calle');
			$table->string('colonia');
			$table->string('ciudad');
			$table->string('cp', 5);
			$table->string('municipio');
			$table->string('estado');
			$table->string('pais');
			$table->integer('num_calle');
			$table->timestamps();
			$table->integer('user_id')->unsigned()->unique();
			$table->foreign('user_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('dirDestino');
	}

}
