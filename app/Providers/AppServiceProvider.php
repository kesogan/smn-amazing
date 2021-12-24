<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Blade;

use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Blade::component('components.art', 'art');
        Blade::component('components.event', 'event');
        Blade::component('components.related-art', 'related_art');
        Blade::component('components.breadcrumb', 'breadcrumb');
        Blade::component('components.data_table', 'data_table');
        Blade::component('components.croup-modal', 'croup');
        Blade::component('components.layout-modal', 'modal');

        Blade::component('dashboard.components.display-detail', 'display_detail');


        Blade::directive('datetime', function ($expression) {
            return "\Carbon\Carbon::parse($expression)->isoFormat('MMMM Do YYYY, h:mm:ss a')";
        });

        /*Blade::directive('datediff', function ($date) {
//            return "\Carbon\Carbon::parse($expression)->diff('MMMM Do YYYY, h:mm:ss a')";
//            echo $yesterday->diffForHumans(Date("2-09-2019 12:00"), ['syntax' => CarbonInterface::DIFF_ABSOLUTE]); // 1 day
            return `\Carbon\Carbon::create($date[0])->diffForHumans($date[1],
                ['syntax' => CarbonInterface::DIFF_ABSOLUTE], false, 3)`;
        });*/
        Blade::directive('datediff2', function ($date) {
//            echo $yesterday->diffForHumans(Date("2-09-2019 12:00"), ['syntax' => CarbonInterface::DIFF_ABSOLUTE]); // 1 day
            return "\Carbon\Carbon::create($date)->diffForHumans($date, ['syntax' => \Carbon\CarbonInterface::DIFF_ABSOLUTE], false, 3)";
        });

        $class_array = [
            'nature people street dt-sc-one-fourth',
            'street landscapes still-life dt-sc-one-fourth',
            'nature still-life dt-sc-one-fourth',
            'people still-life dt-sc-one-fourth',
            'people still-life dt-sc-one-fourth',
            'people nature still-life street dt-sc-one-fourth',
            'people nature people street still-life dt-sc-one-fourth',
            'people nature people street still-life dt-sc-one-fourth',
            'street nature people still-life dt-sc-one-fourth'
        ];

        $position_event = ['left', 'right', 'left', 'right' ];

        View::share('class_array', $class_array);
        View::share('position_event', $position_event);
    }
}
