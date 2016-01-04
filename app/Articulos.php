<?php namespace App;

use Illuminate\Database\Eloquent\Model;
class Articulos extends Model{

    protected $table = 'producto';

	protected $fillable = ['ItemCode','ItemName','Marca','tipo','visto','cotizado','image_url','serie','serie2'];
}