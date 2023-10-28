<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TwoController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportControoler;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArchivesController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SectionsController;
use App\Http\Controllers\UserReportConrroller;
use App\Http\Controllers\InvolcesDetailsController;
use App\Http\Controllers\InvolcesAttachmentController;

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

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/njddk', function () {
    return view('dropdown');
});

Route::get('/involces', [InvoicesController::class, 'index']);
Route::get('/involces_paied', [InvoicesController::class, 'paied']);
Route::get('/involces_unpaied', [InvoicesController::class, 'unpaied']);
Route::get('/involces_hafpaied', [InvoicesController::class, 'hafpaied']);
Route::get('/archives', [InvoicesController::class, 'archives']);
Route::get('/print_invoice/{id}', [InvoicesController::class, 'print']);
Route::get('/delete_involces', [InvoicesController::class, 'index2']);
Route::get('/involces/create', [InvoicesController::class, 'indexadd'])->name('invoicescreate');
Route::get('/Status_show/{id}', [InvoicesController::class, 'show'])->name('Status_show');
Route::post('/Status_Update/{id}', [InvoicesController::class, 'Status_Update'])->name('Status_Update');
Route::post('/involces/store', [InvoicesController::class, 'store'])->name('invoices_store');
Route::post('/involces/updata', [InvoicesController::class, 'updata'])->name('invoices_updata');
Route::delete('delet_inv', [InvoicesController::class, 'delete'])->name('invoices.destroy');
Route::get('/section/{id}', [InvoicesController::class, 'getproducts']);
Route::get('/InvoicesDetails/{id}', [InvolcesDetailsController::class, 'edit']);
Route::get('/edit_inv/{id}', [InvoicesController::class, 'edit']);
Route::get('/restore_inv/{id}', [ArchivesController::class, 'restore']);
Route::delete('destroy', [InvoicesController::class, 'forcedelete'])->name('destroy');

Route::post('add/now', [InvolcesAttachmentController::class, 'open'])->name('attachment_store');
Route::get('View_tile/{invoice_number}/{file_name}', [InvolcesAttachmentController::class, 'test']);


Route::get('/section', [SectionsController::class, 'index']);
Route::post('/section/store', [SectionsController::class, 'store'])->name('sections.store');
Route::put('/section/update', [SectionsController::class, 'update'])->name('sections.update');
Route::DELETE('/section/destroy', [SectionsController::class, 'destroy'])->name('sections.destroy');

Route::get('/products', [ProductsController::class, 'index']);

Route::post('/products/store', [ProductsController::class, 'store'])->name('products.store');
Route::put('/products/update', [ProductsController::class, 'update'])->name('products.update');
Route::DELETE('/products/destroy', [ProductsController::class, 'destroy'])->name('products.destroy');








Route::get('/dashboard', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';




Route::resource('user', UserController::class);
Route::get('/user/delete/{id}', [UserController::class, 'destroy'])->name('user.destroyy');
Route::POST('/user/update/{id}', [UserController::class, 'update'])->name('user.updatee');
Route::POST('/user/role/del/{id}', [UserController::class, 'removeRole'])->name('user.role.del');
Route::resource('roles', RoleController::class);
Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.createe');
Route::post('/roles/destroy/{id}', [RoleController::class, 'destroy'])->name('roles.destroyy');




Route::get('/report', [ReportControoler::class, 'index'])->name('report.index');
Route::post('/Search_invoices', [ReportControoler::class, 'search_invoices'])->name('report.index');

Route::get('/usereport', [UserReportConrroller::class, 'index'])->name('usereport.index');

Route::POST('/usereport.ser', [UserReportConrroller::class, 'ser'])->name('usereport.ser');
