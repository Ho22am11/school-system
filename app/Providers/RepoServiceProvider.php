<?php

namespace App\Providers;

use App\Models\Student;
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
        $this->app->bind(
            'App\Repository\ProcessingFeeRepositoryInterface',
            'App\Repository\ProcessingFeeRepository'
        );
        $this->app->bind(
            'App\Repository\PaymentRepositoryInterface',
            'App\Repository\PaymentRepository'
        );
        $this->app->bind(
            'App\Repository\AttendanceRepositoryInterface',
            'App\Repository\AttendanceRepository'
        );
        $this->app->bind(
            'App\Repository\SubjectRepositoryInterface',
            'App\Repository\SubjectRepository'
        );
        $this->app->bind(
            'App\Repository\ExamRepositoryInterface',
            'App\Repository\ExamRepository'
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
