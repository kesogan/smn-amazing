<?php

namespace App\Http\Controllers;

//use App\Utilities\GetOrder;

use App\Utilities\Paypal\CreateOrder;
use App\Utilities\Paypal\GetOrder;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;
use App\Http\Resources\Order as OrderResource;
use App\Jobs\SendBillMailJob;
use App\Mail\ComfirmationMail;
use App\Mail\SendBillMail;
use App\Models\Cart;
use App\Models\Order;
use App\Utilities\UsefullMethods;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use PDF;

require __DIR__ . '/../../../vendor/autoload.php';
//1. Import the Paypal SDK client that was created in 'set up Server-Side SDK'
//use Sample\PayPalClient;
//use PayPalCheckoutSdk\Orders\OrdersGetRequest;

class PayPalController extends Controller
{
    public function createOrder(Request $request){
        $addres=json_decode($request->addres);
        $cart=Cart::find($request->cartID);
        //dd($addres->addres->shipping_address_1);
        $response=CreateOrder::createOrder($cart,$addres->addres,true);

        // $table->unsignedInteger('cart_id');
        // $table->boolean('shipping');order()->
        $order=new Order([
            "addres1_bill"=>$addres->addres->shipping_address_1,
            "addres2_bill"=>$addres->addres->shipping_address_2,
            "full_name_bill"=>$addres->addres->shipping_first_name." ".$addres->addres->shipping_last_name,
            "mail_on_bill"=>$addres->addres->billing_email,
            "tel_on_bill"=>$addres->addres->billing_phone,
            "shipping"=>false,
            "used_api"=>'paypal',
            "order_id"=>$response->result->id,
            "status"=>$response->result->status,
            ]);
            $order->cart()->associate($cart);
            $order->save();
            //dd($order);
            //dd($addres,$cart,$response);

        return new OrderResource($order);
    }

    public function getOrder(Request $request){
//5C092111L7507661V
        $response=GetOrder::getOrder($request->orderID,true);
        $order=$request->app_orderID;
        $order=Order::find($order);
        $order->status=$response->result->status;
        $order->save();
        $order->cart->cart_items()->update(['order_id'=>$order->id]);
        $user=Auth::user();
        $pdf = PDF::loadView('emails.pdfMails.facture', ['order'=>$order]);
        //return $pdf->download('testt.pdf');
        // dd('$pdf');
        //SendBillMailJob::dispatch($user,$pdf);
         try {
            Mail::to($user)->send(new ComfirmationMail($user,$pdf));
        } catch (\Exception $e) {
        }
        //dd($user);
        return new OrderResource($order);
    }


      /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show(Request $request)
  {
    //   $order=Order::find(7);
    // return view('emails.pdfMails.facture', compact('order'));
  }

    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function cancel()
    {
        dd('Your payment is canceled. You can create cancel page here.');
    }

    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function success(Request $request)
    {
        // $provider = new ExpressCheckout;
        // $response = $provider->getExpressCheckoutDetails($request->token);

        // if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
        //     dd('Your payment was successfully. You can create success page here.');
        // }

        // dd('Something is wrong.');
    }
}
?>
