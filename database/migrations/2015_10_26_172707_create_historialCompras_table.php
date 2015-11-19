<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistorialComprasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('historialCompras', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('tipoPago');
			$table->string('ConfirmacionPago');
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
		Schema::drop('historialCompras');
	}

}
