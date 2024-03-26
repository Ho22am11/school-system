<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Grade\GradeController;
use App\Http\Controllers\Classroom\ClassroomController;
use App\Http\Controllers\Fees\FeeController;
use App\Http\Controllers\Fees\FeeinvoicesController;
use App\Http\Controllers\Section\SectionController;
use App\Http\Controllers\Students\GraduatedController;
use App\Http\Controllers\Students\PaymentController;
use App\Http\Controllers\Students\ProcessingFeeController;
use App\Http\Controllers\Students\PromotionController;
use App\Http\Controllers\Students\ReceiptController;
use App\Http\Controllers\Students\StudentController;
use App\Http\Controllers\TeacherController ;
use Livewire\Livewire;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Route::get('/grade', [GradeController::class, 'index']);


Route::get('/section/{id}',[SectionController::class ,'getclassroom']);

Route::get('/sections/{id}',[StudentController::class ,'getsection']); 


Route::group(
    ['middleware' => ['guest']
    ], function(){ 
        Route::get('/', function () {
            return view('auth.login');
        });

    });

Route::group(  
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ,'auth' ]
    ], function(){ 
        Route::get('/dashboard', function () {
            return view('index');
        })->name('dashboard');
        Route::resource('grade',GradeController::class);
        Route::post('/grade/up',[GradeController::class , 'update'])->name('grade.update');
        Route::post('/grade/delete/{id}',[GradeController::class , 'destroy'])->name('grade.delete');
        Route::resource('/classroom',ClassroomController::class);
        Route::post('select_grade',[ClassroomController::class , 'select'])->name('select');
        Route::resource('/section', SectionController::class);
        Route::post('/section/up',[SectionController::class , 'update'])->name('section.update');
        Route::post('/section/delete',[SectionController::class , 'destroy'])->name('section.delete');
        Route::post('/upload_attachment' ,[StudentController::class , 'upload_attachment'] )->name('upload_attachment');
        Route::resource('/promotion', PromotionController::class);
        Route::resource('/graduated' , GraduatedController::class);
        Route::resource('/fee' , FeeController::class );
        Route::resource('/fee_invoices' , FeeinvoicesController::class );
        Route::resource('/recepit_student' , ReceiptController::class);
        Route::resource('/processing_fee' , ProcessingFeeController::class);
        Route::resource('/payment_student' , PaymentController::class);
        livewire::setUpdateRoute(function ($handle){
            return Route::post('/livewwire/update' , $handle);
        

        });
        
        Route::view('/show_form', 'livewire.show_form');
        Route::resource('/teacher' , TeacherController::class);
        route::get('/add_teacher' , [TeacherController::class , 'add_teacher'])->name('add.teacher');
        route::post('/add_teacher' , [TeacherController::class , 'store'])->name('teacher.store');
        Route::resource('/student' , StudentController::class);
        Route::get('download_Attachments/{filename}/{studentname}' ,[StudentController::class , 'Download']);
        Route::post('/fee.update' , [FeeController::class , 'update'])->name('fee.updatef');
        Route::post('/recepit_studentt' , [ReceiptController::class , 'update'])->name('recepit_student.updatef');
        Route::post('/recepit_student' , [ReceiptController::class , 'store'])->name('recepit_student.store');
       

        
        

    });

    

   


    






require __DIR__.'/auth.php';




