<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComprasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('compras', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('ItemCode');
			$table->string('ItemName');
			$table->string('cantidad');
			$table->string('precio');
			$table->integer('stock');
			$table->timestamps();
			$table->integer('id_historialCompra')->unsigned();
			$table->foreign('id_historialCompra')->references('id')->on('historialCompras');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('compras');
	}


}
