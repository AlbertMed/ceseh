<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Articulos;

class testController extends Controller {

    public function registro()
    {
        set_time_limit ( 1200 );

        $lineas = file('insert.txt');
        foreach ($lineas as $linea_num => $linea)
        {
            $datos = explode("\t",$linea);
            $articulos =array(
                'ItemCode'=>$datos[0],
                'ItemName'=>$datos[1],
                'SubMarca'=>$datos[2],
                'Division'=>$datos[3],
                'Marca'=>$datos[4],
                'visto'=>0,
                'cotizado'=>0,
                'comprado'=>0,
                'image_url'=>'img/6015-MSS.jpg'
            );

            Articulos::create($articulos);
           print_r($datos);

        }

    }

}
