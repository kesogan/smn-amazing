<?php

use App\User;
use App\Models\Art;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class CartTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i=1;
        while($i<3){
            
            $i == 1 ? $user = User::find($i) : $user = User::inRandomOrder()->first();

            $cart = new Cart([
                'user_id' => $user->id
            ]);

            $user->cart()->save($cart);

            $j = 1;$cart_items = []; $max = random_int(1 , 3);
            while( $j < $max){
                $cart_items[$j] = new CartItem([
                    'price' => random_int(15 , 55),
                    'quantity' => random_int(1 , 5)
                ]);

                $cart->cart_items()->save($cart_items[$j]);

                $art = Art::find($i + $j);
                
                $art->cart_items()->save($cart_items[$j]);

                // $cart_items[$j]->art()->associate($art);
                
                $user->save();
                $j++;
            }

            $i++;
        }
    }
}
