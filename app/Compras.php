<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Compras extends Model {

    protected $table = 'compra';

    protected $fillable = ['ItemCode','ItemName','cantidad','precio','id_historialCompra'];

}
