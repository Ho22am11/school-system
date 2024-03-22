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

        $this->app->bind(
            'App\Repository\FeeRepositoryInterface',
            'App\Repository\FeeRepository'
        );

        $this->app->bind(
            'App\Repository\FeeInvoicesRepositoryInterface',
            'App\Repository\FeeInvoicesRepository'
        );  
        $this->app->bind(
            'App\Repository\ReceiptStudentRepositoryInterface',
            'App\Repository\ReceiptStudentRepository'
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
