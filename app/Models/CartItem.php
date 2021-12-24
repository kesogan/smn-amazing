<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CartItem extends Model
{

    use SoftDeletes;
    protected $table = 'cart_item';
    public $timestamps = true;
    protected $fillable = array('quantity', 'price');

    public function cart()
    {
        return $this->belongsTo('App\Models\Cart');
    }

    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }

    public function art()
    {
        return $this->belongsTo('App\Models\Art');
    }

    public function getTotalAttribute(){
        return $this->numberFormat( intval($this->quantity) * intval($this->price) );
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
