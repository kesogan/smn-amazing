<?php

namespace App\database\seeds\Traits;
use App\Models\Technique;

use Illuminate\Database\Eloquent\Model;

trait ModelFactoriesTrait{
    // public function generatModel(Model $model,$modelVar)
    // {
    //     factory($model::class, 50)->create()->each(function ($modelVar){
    //         $modelVar->posts()->save(factory(App\Post::class)->make());
    //     });
    // }
    public function rune(Model $model){
        return factory(Technique::class, 30)->create();
    }
}

?>
