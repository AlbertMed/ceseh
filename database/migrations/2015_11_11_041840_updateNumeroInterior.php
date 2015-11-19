<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateNumeroInterior extends Migration {

	public function up()
	{
		Schema::table('dirdestino', function(Blueprint $table){
			$table->integer('num_interior');
		});
		Schema::table('dirfacturacion', function(Blueprint $table){
			$table->integer('num_interior');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('dirdestino', function(Blueprint $table){
			$table->dropColumn('num_interior');
		});
		Schema::table('dirfacturacion', function(Blueprint $table){
			$table->dropColumn('num_interior');
		});
	}
}
