<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {

        $this->app->bind(
            'App\Repository\TeacherepositoryInterface',
            'App\Repository\TeacherRepository');

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
