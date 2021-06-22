<?php

namespace App\Providers;

use App\Models\User;
use App\Models\WorldMap;
use App\Observers\userObserver;
use App\Observers\WorldMapObserver;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(userObserver::class);
//        WorldMap::observe(WorldMapObserver::class);
    }
}
