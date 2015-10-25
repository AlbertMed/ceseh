<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUser extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function(Blueprint $table){
            $table->string('nombreRazon');
            $table->string('email_cli');
            $table->string('calle');
            $table->string('colonia');
            $table->string('ciudad');
            $table->string('municipio');
            $table->string('estado');
            $table->string('numero');
            $table->string('RFC');
            $table->string('Apellido');
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function(Blueprint $table){
            $table->dropColumn('nombreRazon');
            $table->dropColumn('email_cli');
            $table->dropColumn('calle');
            $table->dropColumn('colonia');
            $table->dropColumn('ciudad');
            $table->dropColumn('municipio');
            $table->dropColumn('estado');
            $table->dropColumn('numero');
            $table->dropColumn('RFC');
            $table->dropColumn('Apellido');
        });
	}

}
