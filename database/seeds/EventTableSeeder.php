<?php

use App\Models\Event;
use App\Models\Image;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i=1;
        while( $i<5){
            $event = new Event([
                'name' => Str::random(10),
                'description' => $i . " - Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do 
                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                    minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex 
                    sunt in culpa qui officia deserunt mollit anim id est laborum.",
                'date' => new DateTime("".$i."-04-2019"),
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $event->save();
            $i++;
        }
    }
}
