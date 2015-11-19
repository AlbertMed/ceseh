<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class DirFactura extends Model {

    protected $table='dirfacturacion';

    protected $fillable=['calle','colonia','ciudad','cp','municipio','estado','pais','num_calle','user_id', 'num_interior'];

}
