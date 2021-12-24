<?php

use Illuminate\Database\Seeder;
use App\Models\Technique;
use App\Models\Art;

class TechniqueTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $techs=factory(Technique::class, 30)->create();
        $arts=Art::all();
        $techs->each(function(App\Models\Technique $tech) use ($arts){
            $tech->arts()->attach(
                $arts->random(rand(5,10))->pluck('id')->toArray()
            );
        });
    }
}
