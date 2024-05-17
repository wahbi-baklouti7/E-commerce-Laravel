<?php

use App\Http\Controllers\ArchivedCategoryController;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Auth\login\LoginController;
use App\Http\Controllers\Auth\logout\LogoutController;
use App\Http\Controllers\Auth\register\RegisterController;
use App\Http\Controllers\BackOfficeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\FrontOfficeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\lang\LanguageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\product\ProductController;
use App\Mail\SampleEmail;
use Illuminate\Support\Facades\Mail;
// use DragonCode\Contracts\Cashier\Auth\Auth;
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
// Route::get('/login', [LoginController::class, 'show'])->name('auth.show');
// Route::get('/register', [RegisterController::class, 'register'])->name('auth.register');
// Route::post('/login', [LoginController::class, 'login'])->name('auth.login');
// Route::get('/logout', [LogoutController::class, 'logout'])->name('auth.logout');




// Route::get('/logout',[LogoutController::class,'logout'])->name('auth.logout');


// BackOffice Routes
// Route::get('/dashboard', [BackOfficeController::class, 'index'])->name('backoffice.index');

// Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard.index');



// Route::middleware('setapplang')->prefix('{locale}')->group(function(){
// //other routes here

//     Route::resource('category',CategoryController::class);

// });


Route::get('/send-email',[EmailController::class,'sendEmail'])->name('sendEmail');

// Route::get('/sendemail', function () {
//     // dd("Email sent successfully!");
//     Mail::to('bakloutiwahbi@gmail.com')->send(new SampleEmail());
//     return "Email sent successfully!";
// });


// FrontOffice Routes
Route::get('/', [FrontOfficeController::class, 'home'])->name('frontoffice.home');
Route::get('/about', [FrontOfficeController::class, 'about'])->name('frontoffice.about');
Route::get('/products/{category?}', [FrontOfficeController::class, 'products'])->name('frontoffice.products');
Route::get('/contact', [FrontOfficeController::class, 'contact'])->name('frontoffice.contact');
Route::get('/cart', [FrontOfficeController::class, 'cart'])->name('frontoffice.cart');
Route::get('/checkout', [FrontOfficeController::class, 'checkout'])->name('frontoffice.checkout');
Route::get('/login_register', [FrontOfficeController::class, 'loginRegister'])->name('frontoffice.loginRegister');
Route::get('/myAccount', [FrontOfficeController::class, 'myAccount'])->name('frontoffice.myAccount');
Route::get('/productDetails/{product?}', [FrontOfficeController::class, 'productDetails'])->name('frontoffice.productDetails');



// *************** Cart Routes ****************
// Route::group(['middleware' => 'auth'], function () {

// });

Route::post('/cart/addToCart/{id}', [CartController::class, 'addToCart'])->name('cart.addToCart');
Route::post('/cart/increment',[CartController::class,'increment'])->name('cart.increment');
Route::delete('/cart/removeFromCart/{id}', [CartController::class, 'removeFromCart'])->name('cart.removeFromCart');
Route::delete('/cart/clearCart', [CartController::class, 'clearCart'])->name('cart.clearCart');

// ************** Checkout Routes *********************
Route::post('/order/create', [OrderController::class, 'create'])->name('order.create');
Route::get('/orders',[OrderController::class,'index'])->name('order.index');
Route::get('/order/status',[FrontOfficeController::class,'orderStatus'])->name('frontoffice.orderStatus');

// Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function () {
    Route::prefix('admin')->middleware('auth')->group(function () {

// **************** Dashboard Routes *********************
Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard.index');

// Route::get('/dashboard', [BackOfficeController::class, 'index'])->name('backoffice.index');
    // Category Routes
    Route::resource('category',CategoryController::class);
    Route::delete('category/action/deleteAll', [CategoryController::class, 'deleteAll'])->name('category.deleteAll');
    Route::delete('category/action/deleteAll', [CategoryController::class, 'deleteAll'])->name('category.deleteAll');
    // Product Routes
    Route::resource('product',ProductController::class);
    Route::delete('product/action/deleteAll', [ProductController::class, 'destroyAll'])->name('product.deleteAll');



});







Route::get('/change/{lang?}',[LanguageController::class,'change'])->name('language.switch');
// Route::get('{lang?}',[LanguageController::class,'change'])->name('language.switch');


// Archived Routes
// Route::prefix('category/archived')->name('archivedCategory.')->group(function () {
//     Route::get('/', [ArchivedCategoryController::class, 'index'])->name('index');
//     Route::delete('/forceDelete/{category}', [ArchivedCategoryController::class, 'forceDelete'])->name('forceDelete');
//     Route::post('/restore/{category}', [ArchivedCategoryController::class, 'restore'])->name('restore');
// });
Route::prefix('admin/category/archived')->name('category.')->group(function () {
    Route::get('/a', [CategoryController::class, 'archived'])->name('archived');
    Route::delete('/{category}/forceDelete', [CategoryController::class, 'forceDelete'])->name('forceDelete');
    Route::post('/{category}/restore', [CategoryController::class, 'restore'])->name('restore');
    Route::post('/restoreAll', [CategoryController::class, 'restoreAll'])->name('restoreAll');
    Route::delete('/deleteAll', [CategoryController::class, 'deleteAllTrashed'])->name('deleteAllTrashed');

});



Auth::routes();

Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::get('/home', [HomeController::class, 'index'])->name('home');


// Errors Routes

Route::get('404',[ErrorController::class,'error404'])->name('error.404');

Route::fallback(function () {
    return redirect()->route('error.404');
});
