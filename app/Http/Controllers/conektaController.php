php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Conekta;
use Conekta_Charge;
use Conekta_Customer;
use Conekta_Error;

use Auth;
use DB;
use App\Carrito;
class conektaController extends Controller {

    public function payWithCreditCard(){
        $producto = DB::table('carrito')->where('cliente', '=', Auth::user()->email)->get();
        $suma =(Integer) Carrito::sum('precio');
        $precio=$suma*100;

        $productos = [];

        // El id debe ser el primer elemento del array
        $primer = true;
        foreach ($producto as $items) {
            if ($primer == true) {
                $primer = false;
                $productos = [
                    ['name' => $items->ItemName, 'sku' => $items->ItemCode, 'unit_price' => $items->precio, 'description' => $items->ItemName,
                        'quantity' => $items->cantidad]
                ];
            }else{
                $productos[] = ['name' => $items->ItemName, 'sku' => $items->ItemCode, 'unit_price' => $items->precio, 'description' => $items->ItemName,
                    'quantity' => $items->cantidad];
            }

        }

        //Conekta secret key
        Conekta::setApiKey("key_X6yW1No6wWjnzxb7kAvqgg");
        Conekta::setLocale('es');
        $mensaje='Todo salio chido';
        try {
            $charge = Conekta_Charge::create(array(
                "amount"=> $precio,
                "currency"=> "MXN",
                "description"=> "pago de prueba de clamps de alberto",
                "reference_id"=> "pago_de_clamps",//C00123 nombre
                "card"=> $_POST['conektaTokenId'], //"tok_a4Ff0dD2xYZZq82d9",
                "details"=> array(
                    "email"=>Auth::user()->email,
                    "line_items"=> $productos
                )
            ));
            //dd($charge->status);
            return view('paymentResponse.response')->with(compact('charge'));
        } catch (Conekta_Error $e){
            $mensaje= $e->getMessage(); //el pago no pudo ser procesado
        }

    }

}
