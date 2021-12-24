<?php

use App\User;
use App\Models\Art;
use App\Models\Event;
use App\Models\Image;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class ImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // art images
        $i=1;
        while( $i<21){
            $image = new Image([
                'url' => 'img-'.$i.'.jpg',
                'alt' => Str::random(10)
            ]);
            $image2 = new Image([
                'url' => 'blog-img-'.$i.'.jpg',
                'alt' => Str::random(10)
            ]);

            $art = Art::find($i);
            $art->images()->save($image);
            $i++;
        }

        // Event images
        $j=1;$p=1;
        while( $j<17){
            $image2_1 = new Image([
                'url' => 'blog-img'. ($j + 1) .'.jpg',
                'alt' => Str::random(10)
            ]);
            $image2_2 = new Image([
                'url' => 'blog-img'. ($j + 2) .'.jpg',
                'alt' => Str::random(10)
            ]);
            $image2_3 = new Image([
                'url' => 'blog-img'. ($j + 3) .'.jpg',
                'alt' => Str::random(10)
            ]);
            $image2_4 = new Image([
                'url' => 'blog-img'. ($j + 4) .'.jpg',
                'alt' => Str::random(10)
            ]);

            $event = Event::find($p);
            $event->images()->save($image2_1);
            $event->images()->save($image2_2);
            $event->images()->save($image2_3);
            $event->images()->save($image2_4);
            $p++;
            $j = $j + 4;
        }

        $users = User::all();
        foreach ($users as $user) {
            $image = new Image([
                'url' => 'default.png',
                'alt' => Str::random(10)
            ]);
            $user->image()->save($image);
        }
    }
}
