<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Art;
use App\Models\Cart;
use App\Models\CartItem;
use App\Utilities\Paypal\CreateOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class ShopController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except([]);
        // $this->middleware('ajax')->only(['addCartItem']);
    }

    /**
     * Show the application.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function detail()
    {
        $cart = Auth::user()->cart;
        // $d=Cart::find(2);
        // //$d=Cart::has('cart_items')->get();
        // $d=$d->cart_items()->doesntHave('order')->get();
        // $g=Cart::where('id','2')->first();
        // dd($g);
        foreach ($cart->cart_items as $cart_item) {
            if($cart_item->art == null) {
                $cart_item->delete();
                continue;
            }
        }
        // dd($cart->cart_items[0]->art);
        return view('shop.detail', compact('cart'));
    }

    public function addCartItem(Request $request)
    {
        $art = Art::find($request->idArt);
        //dd($art);
        // $cart = Auth::user()->cart;
// $user=Auth::user();

        // Auth::user()->cart->cart_items->where('id', $request->idCartItem)->first();
        $cart_items = Auth::user()->cart->cart_items()->doesntHave('order')->get();

        // $response = $cart_items->find($art->id);
        $response = $cart_items->filter(function ($value, $key) use($art) {
            // dd($art->id);
            return $value->art->id == $art->id;
        });

        if($response->count() > 0) {
            $art->cart_items[0]->quantity = intval($art->cart_items[0]->quantity) + 1;
            // dd($art->cart_items[0]->quantity);

            $art->cart_items[0]->save([]);
        }
        else {

           $cart_item = new CartItem([
               'price' => $request->price,
               'quantity' => $request->quantity
           ]);
           // Auth::user()->cart()->cart_items()->save($new_cart);

           Auth::user()->cart->cart_items()->save($cart_item);

           $art->cart_items()->save($cart_item);
       }

       return response()->json([
        'status' => true,
        'items_number' => Auth::user()->cart->cart_items()->doesntHave('order')->count(),
        'subtotal' => Auth::user()->cart->total,
    ], 200);
        //  return response()->json(['status' => true]);
    }

    public function removeCartItem($idCartItem)
    {

        try {
            Auth::user()->cart->cart_items()->doesntHave('order')->where('id', $idCartItem)->first()->destroy($idCartItem);

            return response()->json(['status' => true], 200);
        } catch (\Throwable $th) {
            // error_flash_message();
            dd($th);
            return response()->json(['status' => false], 500);
        }
    }

    public function updateCartItem(Request $request)
    {
        if(isset($request->isQuantity))
        {
            $request -> validate([
                'quantity' => 'required|integer',
                'idCartItem' => 'required',
                'isUpQuantity' => 'required',
            ],[
            'quantity.required' => 'quantity is required',
            'isUpQuantity.required' => 'isUpQuantity is required'
            ]);

            $cart_item = Auth::user()->cart->cart_items()->doesntHave('order')->where('id', $request->idCartItem)->first();

            // dd($cart_item);
            if($request->isUpQuantity == "true") {
                $cart_item->quantity = $request->quantity + 1 ;
            }
            else if($request->isUpQuantity == "false") {
                $cart_item->quantity = $request->quantity - 1 ;
            } else {
                return response()->json(['status' => false], 500);
            }
            try {
                Auth::user()->cart->cart_items()->save($cart_item);

                $cart = Auth::user()->cart;
//                dd($cart->cart_items);
                return response()->json([
                    'status' => true,
                    'quantity' => $cart->cart_items()->doesntHave('order')->where('id', $request->idCartItem)->first()->quantity,
                    'items_number' => $cart->cart_items()->doesntHave('order')->count(),
                    'total' => $cart->cart_items()->doesntHave('order')->where('id', $request->idCartItem)->first()->total,
                    'subtotal' => $cart->total,
                ], 200);
            } catch(\Throwable $th) {
                return response()->json(['status' => false], 500);
            }
        }

    }

    public function checkout(Request $request)
    {
        $cart = Auth::user()->cart;
        // dd($cart->cart_items[0]->art);
        return view('shop.checkout', compact('cart'));
    }

    public function completCheckout(Request $request){
        $cart = Auth::user()->cart;
        $addres=array (
      "billing_first_name" => $request->billing_first_name,
      "billing_last_name" => $request->billing_last_name,
      "billing_address_1" => $request->billing_address_1,
      "billing_address_2" => $request->billing_address_2,
      "billing_state" => $request->billing_state,
      "billing_postcode" => $request->billing_postcode,
      "billing_email" => $request->billing_email,
      "billing_phone" => $request->billing_phone,
      "ship_to_different_address" => $request->ship_to_different_address,
      "shipping_country" => $request->shipping_country,
      "shipping_first_name" => $request->shipping_first_name,
      "shipping_last_name" => $request->shipping_last_name,
      "shipping_company" => $request->shipping_company,
      "shipping_address_1" => $request->shipping_address_1,
      "shipping_address_2" => $request->shipping_address_2,
      "shipping_state" => $request->shipping_state,
      "shipping_postcode" => $request->shipping_postcode,
      "order_comments" => $request->order_comments,
      "quantity" => $request->quantity,
      "shipping_method" => $request->shipping_method,
        );
        //$pp = CreateOrder::createOrder($cart,$addres,true);
        $addres=["addres"=>$addres];
        $addres=json_encode($addres);
        //dd($addres);
        $mail=$request->billing_email;
        return view('shop.shop-checkout', compact('cart','addres','mail'));
    }
}
