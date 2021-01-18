<?php

namespace App\Providers;

use App;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        // Using class based composers...
        View::composer(
            'header', 'App\Http\ViewComposers\ScrollingNewsComposer'
        );
        View::composer(
            'footer', 'App\Http\ViewComposers\NewsComposer'
        );
        View::composer(
            'footer', 'App\Http\ViewComposers\ContentComposer'
        );
        View::composer(
            'pages.partials.home_slider', 'App\Http\ViewComposers\SliderComposer'
        );
        View::composer(
            'pages.partials.latest_news', 'App\Http\ViewComposers\NewsComposer'
        );
        View::composer(
            'pages.partials.clinics_home', 'App\Http\ViewComposers\ClinicComposer'
        );

        // Using Closure based composers...
        View::composer('dashboard', function ($view) {
            //
        });
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}