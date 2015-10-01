<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DatosEntrega extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('datosEntrega', function(Blueprint $table){
            $table->increments('id');
            $table->string('en_email_cli')->unique();
            $table->string('en_calle');
            $table->string('en_colonia');
            $table->string('en_ciudad');
            $table->string('en_cp');
            $table->string('en_municipio');
            $table->string('en_estado');
            $table->string('en_numero');
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
        Schema::drop('datosEntrega');
	}

}
