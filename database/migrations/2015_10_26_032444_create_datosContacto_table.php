<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatosContactoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('datosContacto', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre');
			$table->integer('telefono');
			$table->integer('user_id')->unsigned()->unique();
			$table->timestamps();
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
		Schema::drop('datosContacto');
	}

}
