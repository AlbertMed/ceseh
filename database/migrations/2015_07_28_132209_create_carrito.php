


<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarrito extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()  {
        //
        Schema::create('carrito',function(Blueprint $table){
            $table->increments('id');
            $table->string('ItemCode');
            $table->string('ItemName');
            $table->string('cantidad');
            $table->string('precio');
            $table->integer('stock');
            $table->string('cliente');
            $table->integer('user_id')->unsigned();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('carrito');
    }
}
