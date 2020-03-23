<?php

namespace App\Providers;

use App\Contract\User\UserRepositoryInterface;
use App\Contract\User\UserServiceInterface;
use App\Http\Repository\UserRepository;
use App\Http\Service\UserService;
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
        $this->app->singleton(UserRepositoryInterface::class,UserRepository::class);
        $this->app->singleton(UserServiceInterface::class,UserService::class);
    }
}
