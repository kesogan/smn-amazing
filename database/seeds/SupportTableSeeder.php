<?php

use Illuminate\Database\Seeder;
use App\Models\Support;
use App\Models\Art;

class SupportTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $supports=factory(Support::class, 30)->create();
       $arts=Art::all();
        $supports->each(function(App\Models\Support $support) use ($arts){
            $support->arts()->attach(
                $arts->random(rand(5,10))->pluck('id')->toArray()
            );
        });
    }
}
