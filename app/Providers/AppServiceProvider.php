<?php

namespace App\Providers;

use App\Actions\PlayerLevelUp;
use App\Actions\PlayerMassHeal;
use App\Actions\PlayerMassLevelUp;
use App\Models\User;
use App\Observers\userObserver;
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
        app()->voyager->addAction(PlayerLevelUp::class);
        app()->voyager->addAction(PlayerMassLevelUp::class);
        app()->voyager->addAction(PlayerMassHeal::class);
    }
}
