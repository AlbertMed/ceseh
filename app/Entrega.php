<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entrega extends Model{

     protected $table = 'datosentrega';

	protected $fillable = ['en_email_cli','en_calle','en_colonia','en_ciudad','en_cp','en_municipio','en_estado','en_numero'];
}
