<?php

use App\Models\Art;
use Illuminate\Database\Seeder;

class ArtTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$i=1;
        while( $i<21){
            $art = new Art([
                'name' => Str::random(10),
                'description' => $i . " - Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                    minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
                    sunt in culpa qui officia deserunt mollit anim id est laborum.",
                'price' => random_int(3, 100),
                'quantity' => random_int(1, 10),
                'start_at' => now()->toDateTime(),
                'end_at' => now()->toDateTime(),
                'type' => array_rand(['default', 'tattoo']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $art->save();
            $i++;
        }*/

        factory(Art::class, 30)->create();
//        factory(Art::class, 30)->create( ['type' => array_rand(['default', 'tattoo']) ]);

    }
}
