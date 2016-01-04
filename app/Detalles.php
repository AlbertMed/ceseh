<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalles extends Model
{
    //
    protected $table = 'detalleProducto';

    protected $fillable = ['ItemCode', 'det1', 'det2'];
}