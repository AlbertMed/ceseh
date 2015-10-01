<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateProducto extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('producto', function(Blueprint $table){
            $table->string('visto');
            $table->string('cotizado');
            $table->string('comprado');
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('producto', function(Blueprint $table){
            $table->dropColumn('visto');
            $table->dropColumn('cotizado');
            $table->dropColumn('comprado');
        });
	}

}
