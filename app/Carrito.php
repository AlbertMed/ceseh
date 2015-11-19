<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrito extends Model{
	protected $primaryKey = 'ItemCode';
    //
    protected $table = 'carrito';

	protected $fillable = ['ItemCode','ItemName','cantidad','precio', 'stock', 'cliente', 'user_id'];
}
