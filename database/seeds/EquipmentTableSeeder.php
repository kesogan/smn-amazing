<?php

use Illuminate\Database\Seeder;
use App\Models\Equipment;
use App\Models\Art;

class EquipmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $eqquips=factory(Equipment::class, 30)->create();
        $arts=Art::all();
        $eqquips->each(function(App\Models\Equipment $eqquip) use ($arts){
            $eqquip->arts()->attach(
                $arts->random(rand(5,10))->pluck('id')->toArray()
            );
        });
    }
}
