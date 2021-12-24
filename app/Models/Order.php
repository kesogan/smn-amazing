<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Order extends Model
{
    use SoftDeletes;
    protected $fillable = array('status','order_id','used_api','full_name_bill','mail_on_bill','tel_on_bill','addres1_bill','addres2_bill','shipping');
    // [
//         "intent" => "CAPTURE",
//         "purchase_units" => [[
//             "reference_id" => "test_ref_id1",
//             "amount" => [
//                 "value" => "100.00",
//                 "currency_code" => "USD"
//             ]
//         ]],
//         "redirect_urls" => [
//             "cancel_url" => "https://example.com/cancel",
//             "return_url" => "https://example.com/return"
//         ]
//     ];
    public function cart(){
        return $this->belongsTo('App\Models\Cart','cart_id');
    }
    public function cart_items(){
        return $this->hasMany('App\Models\CartItem');
    }

    public function getTotalAttribute(){
        $total = $this->cart_items->reduce(function ($total, CartItem $cartItem) {
            $total  += intval($cartItem->total);
            return $total;
        }, 0);
        $sum = 0;
        foreach ($this->cart_items as $item) {
            $sum += intval($item->total);
        }

        return $this->numberFormat($sum);
//        return $this->numberFormat($total);
    }
    /**
     * Get the Formated number
     *
     * @param $value
     * @param $decimals
     * @param $decimalPoint
     * @param $thousandSeperator
     * @return string
     */
    private function numberFormat($value, $decimals = 2, $decimalPoint = '.', $thousandSeperator = ',')
    {
        if(is_null($decimals)){
            $decimals = is_null(config('cart.format.decimals')) ? 2 : config('cart.format.decimals');
        }
        if(is_null($decimalPoint)){
            $decimalPoint = is_null(config('cart.format.decimal_point')) ? '.' : config('cart.format.decimal_point');
        }
        if(is_null($thousandSeperator)){
            $thousandSeperator = is_null(config('cart.format.thousand_seperator')) ? ',' : config('cart.format.thousand_seperator');
        }
        return number_format($value, $decimals, $decimalPoint, $thousandSeperator);
    }
}
