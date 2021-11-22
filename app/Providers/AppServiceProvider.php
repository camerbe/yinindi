<?php

namespace App\Providers;

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
       $this->registerRoleRepo();
       $this->registerUserRepo();
       $this->registerMembreRepo();
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

    public function registerRoleRepo()
    {
        return $this->app->bind('App\Repositories\BaseRepository','App\Repositories\RoleRepository');
    }
    public function registerUserRepo()
    {
        return $this->app->bind('App\Repositories\BaseRepository','App\Repositories\UserRepository');
    }
    public function registerMembreRepo()
    {
        return $this->app->bind('App\Repositories\BaseRepository','App\Repositories\MembreRepository');
    }
}
