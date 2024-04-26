<?php

use App\Http\Controllers\ArchivedCategoryController;
use App\Http\Controllers\Auth\login\LoginController;
use App\Http\Controllers\Auth\logout\LogoutController;
use App\Http\Controllers\Auth\register\RegisterController;
use App\Http\Controllers\BackOfficeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontOfficeController;
use Illuminate\Support\Facades\Route;

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

// authentification routes
Route::get('/login', [LoginController::class, 'show'])->name('auth.show');
Route::get('/register', [RegisterController::class, 'register'])->name('auth.register');
Route::post('/login', [LoginController::class, 'login'])->name('auth.login');
// Route::get('/logout', [LogoutController::class, 'logout'])->name('auth.logout');




Route::get('/logout',[LogoutController::class,'logout'])->name('auth.logout');


// BackOffice Routes
Route::get('/dashboard', [BackOfficeController::class, 'index'])->name('backoffice.index');


// FrontOffice Routes
Route::get('/', [FrontOfficeController::class, 'home'])->name('frontoffice.home');
Route::get('/about', [FrontOfficeController::class, 'about'])->name('frontoffice.about');
Route::get('/products', [FrontOfficeController::class, 'products'])->name('frontoffice.products');
Route::get('/contact', [FrontOfficeController::class, 'contact'])->name('frontoffice.contact');
Route::get('/cart', [FrontOfficeController::class, 'cart'])->name('frontoffice.cart');
Route::get('/checkout', [FrontOfficeController::class, 'checkout'])->name('frontoffice.checkout');
Route::get('/login_register', [FrontOfficeController::class, 'loginRegister'])->name('frontoffice.loginRegister');
Route::get('/myAccount', [FrontOfficeController::class, 'myAccount'])->name('frontoffice.myAccount');
Route::get('/productDetails', [FrontOfficeController::class, 'productDetails'])->name('frontoffice.productDetails');



// Category Routes
Route::resource('category',CategoryController::class);

// Archived Routes
// Route::prefix('category/archived')->name('archivedCategory.')->group(function () {
//     Route::get('/', [ArchivedCategoryController::class, 'index'])->name('index');
//     Route::delete('/forceDelete/{category}', [ArchivedCategoryController::class, 'forceDelete'])->name('forceDelete');
//     Route::post('/restore/{category}', [ArchivedCategoryController::class, 'restore'])->name('restore');
// });
Route::prefix('category/archived')->name('category.')->group(function () {
    Route::get('/a', [CategoryController::class, 'archived'])->name('archived');
    Route::delete('/{category}/forceDelete', [CategoryController::class, 'forceDelete'])->name('forceDelete');
    Route::post('/{category}/restore', [CategoryController::class, 'restore'])->name('restore');
});

Route::fallback(function () {
    return view('frontoffice.error404');
    // return redirect('/');
});
