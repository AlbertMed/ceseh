<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\contactoRequest;

class ContactoController extends Controller{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(contactoRequest $request){
        $data = $request->all();
        $mensaje='Mensaje enviado con exito';
        $color="green accent-2";
       try {
           //se envia el array y la vista lo recibe en llaves individuales {{ $email }} , {{ $subject }}...
           \Mail::send('emails.message', $data, function ($message) use ($request) {
               //remitente
               $message->from($request->email, $request->nombre_empresa);

               //asunto
               $message->subject($request->asunto);

               //receptor
               $message->to(env('CONTACT_MAIL'), env('CONTACT_NAME'));
               $color="red lighten-3";

           });
       }catch (Exception $e){
         $mensaje='Ocurrio un error al enviar su mensaje';
       }
        return view('datos.contacto')->with(compact('mensaje','color'));

    }

}
