<?php

namespace App\Utilities\Paypal;

require __DIR__ . '/../../../vendor/autoload.php';

use App\Models\Cart;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;

class CreateOrder
{

    /**
     * Setting up the JSON request body for creating the Order. The Intent in the
     * request body should be set as "CAPTURE" for capture intent flow.
     *
     */
    private static function buildRequestBody($cart,$addres)
    {
        return array(
            "intent" => "CAPTURE",
            "application_context" =>
                array(
                    "return_url" => "https://example.com/return",
                    "cancel_url" => "https://example.com/cancel",
                    "brand_name" => "SMNDESIGN",
                    "locale" => "en-US",
                    "landing_page" => "BILLING",
                    "shipping_preferences" => "SET_PROVIDED_ADDRESS",
                    "user_action" => "PAY_NOW"
                ),
            "purchase_units" =>
                array(
                    0 =>
                        array(
                            "reference_id" => "paypal",
                            "description" => "Multiple Arts",
                            "custom_id" => "CUST-HighFashions",
                            "soft_descriptor" => "HighFashions",
                            "amount" =>
                                array(
                                    "currency_code" => "USD",
                                    //nb :value":"240.00","issue":"AMOUNT_MISMATCH",
                                    //"description":"Should equal item_total + tax_total +
                                    //shipping + handling + insurance - shipping_discount - discount."}]

                                    "value" => $cart->total."",
                                    "breakdown" =>
                                        array(
                                            "item_total" =>
                                                array(
                                                    "currency_code" => "USD",
                                                    //"issue":"ITEM_TOTAL_MISMATCH",
                                                    //"description":"Should equal sum of (unit_amount * quantity)
                                                    // across all items for a given purchase_unit"}
                                                    "value" => $cart->total."",
                                                ),
                                            "shipping" =>
                                                array(
                                                    "currency_code" => "USD",
                                                    "value" => "0.00",
                                                ),
                                            "handling" =>
                                                array(
                                                    "currency_code" => "USD",
                                                    "value" => "0.00"
                                                ),
                                            "tax_total" =>
                                                array(
                                                    "currency_code" => "USD",
                                                    "value" => "10.00"
                                                ),
                                            "shipping_discount" =>
                                                array(
                                                    "currency_code" => "USD",
                                                    "value" => "10.00"
                                                ),
                                            "discount" =>
                                                array(
                                                    "currency_code" => "USD",
                                                    "value" => "0.00"
                                                ),
                                        ),
                                ),
                            "items" =>self::cartItems($cart),
                            "shipping" =>
                                array(
                                    "method" => "United States Postal Service",
                                    "name" =>
                                        array(
                                            "full_name" => $addres->shipping_first_name." ".$addres->shipping_last_name.""
                                        ),
                                    "address" =>
                                        array(
                                            "country"=>$addres->shipping_country."",
                                            "address_line_1" => $addres->shipping_address_1."",
                                            "address_line_2" => $addres->shipping_address_2."",
                                            "admin_area_1" => $addres->shipping_state."",
                                            "admin_area_2" => "CA",
                                            "postal_code" => $addres->shipping_postcode."",
                                            "country_code" => "US",
                                            "payer_mail_address"=>$addres->billing_email."",
                                            "reciever_mail_address"=>$addres->billing_email."",
                                            "shipping_mail_address"=>$addres->billing_email.""
                                        ),
                                ),
                        ),
                ),
        );

    }
    public static function cartItems(Cart $cart){
        $cartItemss=[];
        foreach ($cart->cart_items()->doesntHave('order')->get() as $key=>$cartItem) {
             $cartItems = array(
                "name" => $cartItem->art->name,
                // "description" =>$cartItem->art->description,
                "sku" => "sku02",
                "unit_amount" =>
                    array(
                        "currency_code" => "USD",
                        "value" => $cartItem->price.""
                    ),
                "tax" =>
                    array(
                        "currency_code" => "USD",
                        "value" => "0.0"
                    ),
                "quantity" => $cartItem->quantity."",
                "category" => "PHYSICAL_GOODS"
                );
            array_push($cartItemss,$cartItems);
        }
        return $cartItemss;
    }
    /**
     * This is the sample function which can be sued to create an order. It uses the
     * JSON body returned by buildRequestBody() to create an new Order.
     */
    public static function createOrder($cart,$addres,$debug=false)
    {
        // dd(self::buildRequestBody($cart,$addres));
        $request = new OrdersCreateRequest();
        $request->headers["prefer"] = "return=representation";
        $request->body = self::buildRequestBody($cart,$addres);
        $client = PayPalClient::client();
        $response = $client->execute($request);
        return $response;
    }
}


/**
 * This is the driver function which invokes the createOrder function to create
 * an sample order.
 */
if (!count(debug_backtrace()))
{
    CreateOrder::createOrder($cart,$addres,true);
}



