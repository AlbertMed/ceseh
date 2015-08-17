


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
            $table->string('ItemCode');
            $table->string('ItemName');
            $table->string('cantidad');
            $table->string('precio');
            $table->string('cliente');
            $table->string('status');
            $table->timestamps();

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
