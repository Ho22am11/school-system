<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Grade\GradeController;
use App\Http\Controllers\Classroom\ClassroomController;
use App\Http\Controllers\Section\SectionController;
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
        livewire::setUpdateRoute(function ($handle){
            return Route::post('/livewwire/update' , $handle);

        });
        
        Route::view('/show_form', 'livewire.show_form');
        Route::resource('/teacher' , TeacherController::class);
        route::get('/add_teacher' , [TeacherController::class , 'add_teacher'])->name('add.teacher');
        route::post('/add_teacher' , [TeacherController::class , 'store'])->name('teacher.store');
        
        

    });

    

   


    






require __DIR__.'/auth.php';




