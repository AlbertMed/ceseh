<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class DirEntrega extends Model {

    protected $table='dirdestino';

    protected $fillable=['calle','colonia','ciudad','cp','municipio','estado','pais','num_calle','user_id', 'num_interior'];

}
