<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\UserInterface;
use App\Repositories\UserRepository;
use App\Contracts\UserTypeInterface;
use App\Repositories\UserTypeRepository;
use App\Contracts\CategoryInterface;
use App\Repositories\CategoryRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserInterface::class, UserRepository::class);
        $this->app->bind(UserTypeInterface::class, UserTypeRepository::class);
        $this->app->bind(CategoryInterface::class, CategoryRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
