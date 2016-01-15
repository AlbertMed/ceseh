<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;

use App\Carrito;
use App\Historial;
use App\Compras;

use URL;
use Session;
use Redirect;
use Input;
use Auth;
use DB;
use Config;

class PaypalController extends Controller
{

    private $_api_context;

    public function __construct()
    {

        // setup PayPal api context
        $paypal_conf = Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
        $this->_api_context->setConfig($paypal_conf['settings']);
    }

    public function pay()
    {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        //agregar items de base de datos
        $items = array();
        $subtotal = 0;
        $productos = DB::table('carrito')
            ->Join('producto', 'carrito.ItemCode', '=', 'producto.ItemCode')
            ->where('carrito.user_id', Auth::user()->id)
            ->get();
        //dd(Auth::user()->id);
        $currency = 'MXN';
        foreach ($productos as $key => $p) {
            $pIva = $p->precio * 0.16;
            $precioIva = $p->precio + $pIva;
            $item = new Item();
            $item->setName($p->ItemName)
                ->setCurrency($currency)
                ->setDescription($p->tipo)
                ->setQuantity($p->cantidad)
                ->setPrice($precioIva);
            $items[$key] = $item;
            $subtotal += ($p->cantidad * $precioIva);
        }

        // add item to list
        $item_list = new ItemList();
        $item_list->setItems($items);

        $details = new Details();
        $details->setSubtotal($subtotal)
            ->setShipping(100);
        $total = $subtotal + 100;

        $amount = new Amount();
        $amount->setCurrency($currency)
            ->setTotal($total)
            ->setDetails($details);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Your transaction description');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('payment.status'))
            ->setCancelUrl(URL::route('payment.status'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));

        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                return Redirect::route('carrito.failed');
                exit;
            } else {
                return Redirect::route('carrito.failed');
            }
        }

        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }

        // add payment ID to session
        Session::put('paypal_payment_id', $payment->getId());

        if (isset($redirect_url)) {
            // redirect to paypal
            return Redirect::away($redirect_url);
        }

        return Redirect::route('carrito.failed');
    }

    public function getPaymentStatus()
    {
        //obtenemos el id de pago antes de limpiar la session
        $payment_id = Session::get('paypal_payment_id');

        //limpiamos la session donde se encuentra el id de pago
        Session::forget('paypal_payment_id');

        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
            return Redirect::route('carrito.failed');
        }

        $payment = Payment::get($payment_id, $this->_api_context);

        /**
         * el objeto Payment contiene información necesaria
         * para ejecutar el pago con la cuenta PayPal
         * el payer_id es agregado en los parametros del query
         * esto se usa cuando el usuario es redirigido al sitio desde paypal
         */

        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));

        /**
         * Ejecutamos el pago
         */
        $result = $payment->execute($execution, $this->_api_context);

        /**
         * si es aprovado se realiza el pago/compra
         */
        if ($result->getState() == 'approved') {
            $id = $result->getId();
            $token = csrf_token();
            $datos = Carrito::where('user_id', Auth::user()->id)->get();
            $his = array(
                'tipoPago' => 'PayPal',
                'ConfirmacionPago' => $id,
                'user_id' => Auth::user()->id
            );
            Historial::create($his);
            $gID = Historial::firstOrNew(['ConfirmacionPago' => $id]);
            foreach ($datos as $d) {
                $Detalle = array(
                    'ItemCode' => $d->ItemCode,
                    'ItemName' => $d->ItemName,
                    'cantidad' => $d->cantidad,
                    'precio' => $d->precio,
                    'id_historialCompra' => $gID->id
                );
                Compras::create($Detalle);
            }
            Carrito::where('user_id', Auth::user()->id)->delete();
            Session::put('cant', 0);
            return Redirect::route('carrito.success', [$id, $token]);
            //
        }

        return Redirect::route('carrito.failed');
    }

    public function postPayment($id, $token)
    {
        return view('carrito.CreditCardR');
    }

    public function postPaymentF($token)
    {
        return view('carrito.CreditCardRF');
    }

}
