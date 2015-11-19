<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Busqueda extends Model {

    protected $table='busqueda';

    protected $fillable=['busqueda','nombre','email'];

}
