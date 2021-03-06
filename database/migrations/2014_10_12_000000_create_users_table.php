<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombreEmpresa');
			$table->string('nombre');
			$table->string('Apellido');
			$table->string('sapResultado');
			$table->string('grupoGiro');
			$table->string('RFC');
			$table->integer('telefono');
			$table->string('email');
			$table->string('password', 20);
			$table->rememberToken();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
