<?php

namespace App\Providers;

use App\Interfaces\CreatNewSlideFich;
use App\Services\CreatNewSlide;
use App\Services\DateBase\database;
use App\Services\DateBase\databaseInreface;
use App\Services\News\CreateNewNews;
use App\Services\News\NewNews;
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
        $this->app->bind(databaseInreface::class, database::class);
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
