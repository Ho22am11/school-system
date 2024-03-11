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

         $this->app->bind(
            'App\Repository\StudentRepositoryInterface',
            'App\Repository\StudentRepository');

        $this->app->bind(
            'App\Repository\PromotionRepositoryInterface',
            'App\Repository\PromotionRepository'
        );
        $this->app->bind(
            'App\Repository\GraduatedStudentRepositoryInterface',
            'App\Repository\GraduatedStudentRepository'
        );

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
