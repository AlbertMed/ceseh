<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\contactoRequest;
use App\Http\Requests\comprobanteRequest;
use PhpSpec\Exception\Exception;
use Session;

use DB;
use Auth;
use Mail;

class ContactoController extends Controller{

    public function index()
    {
        return view('bank');
    }
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

    public function comprobanteDeposito(comprobanteRequest $request){

try{
    //obtenemos el campo file definido en el formulario
    $file = $request->file('file');

    //obtenemos el nombre del archivo
    $nombre = Auth::user()->sapResultado.$file->getClientOriginalName();

    //indicamos que queremos guardar un nuevo archivo en el disco local
    \Storage::disk('local')->put($nombre,  \File::get($file));

    $usuario = Auth::user()->sapResultado;

    Mail::send('emails.comprobantepago',['sapUser'=>$usuario, 'name' => Auth::user()->name ], function($message) use($nombre)
    {
        $message->from(env('MAIL_USERNAME'), 'Ventas Web');
        $message->to('albert91.me.d@gmail.com', 'Ventas')->subject('Comprobante Depósito');
        $message->attach(public_path().'/storage/comprobantes/'.$nombre);
    });

    Session::flash('mensaje', 'Hemos recibido tu comprobante. La validación de este documento llevará hasta un día.');
    \Storage::delete($nombre);
    return redirect()->back();

    }catch (Exception $e) {
    Session::flash('mensaje', 'Ha ocurrido un error al recibir tu comprobante');
    }

    }

}
