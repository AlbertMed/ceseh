<?php namespace App;

use Illuminate\Database\Eloquent\Model;
class Articulos extends Model{

    protected $table = 'producto';

	protected $fillable = ['ItemCode','ItemName','SubMarca','Division','Marca','visto','cotizado','comprado'];
}