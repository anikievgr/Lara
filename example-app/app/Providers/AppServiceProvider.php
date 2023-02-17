<?php

namespace App\Providers;

use App\Interfaces\CreatNewSlideFich;
use App\Services\CreatNewSlide;
use App\Services\NewNews;
use App\Interfaces\CreateNewNews;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CreateNewNews::class, NewNews::class);
        $this->app->bind(CreatNewSlideFich::class, CreatNewSlide::class);
            $this->app->register('App\Providers\FakerServiceProvider');

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
