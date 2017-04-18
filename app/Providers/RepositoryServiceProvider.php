<?php

namespace Someline\Providers;

use Illuminate\Support\ServiceProvider;
use Someline\Repositories\Eloquent\SensorRepositoryEloquent;
use Someline\Repositories\Eloquent\RecordRepositoryEloquent;
use Someline\Repositories\Eloquent\UserRepositoryEloquent;
use Someline\Repositories\Interfaces\SensorRepository;
use Someline\Repositories\Interfaces\RecordRepository;
use Someline\Repositories\Interfaces\UserRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepository::class, UserRepositoryEloquent::class);
        $this->app->bind(SensorRepository::class, SensorRepositoryEloquent::class);
        $this->app->bind(RecordRepository::class, RecordRepositoryEloquent::class);
        //:end-bindings:
    }
}
