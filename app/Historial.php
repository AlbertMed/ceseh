<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Historial extends Model {

    protected $table = 'historial';

    protected $fillable = ['tipoPago','ConfirmacionPago','user_id'];

}
