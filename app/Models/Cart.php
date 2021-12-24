<?php

namespace App\Models;

use App\Models\CartItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use SoftDeletes;
    protected $table = 'cart';
    public $timestamps = true;
    protected $fillable = array('user_id');

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function cart_items()
    {
        return $this->hasMany('App\Models\CartItem');
    }

    public function order(){
        return $this->hasOne('App\Models\Order','order_id');
    }

    public function getTotalAttribute(){
        $total = $this->cart_items()->doesntHave('order')->get()->reduce(function ($total, CartItem $cartItem) {
            $total  += intval($cartItem->total);
            return $total;
        }, 0);
        $sum = 0;
        foreach ($this->cart_items()->doesntHave('order')->get() as $item) {
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



