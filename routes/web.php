<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Grade\GradeController;
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
        });
        Route::resource('grade',GradeController::class);

    });



    






require __DIR__.'/auth.php';




