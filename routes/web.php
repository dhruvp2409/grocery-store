<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\InquiryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Front\OrderController;
use App\Http\Controllers\Front\PageController;
use App\Http\Controllers\Front\ProductController as FrontProductController;
use App\Http\Controllers\Front\OrderController as FrontOrderController;
use App\Http\Controllers\ProfileController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('register', [AuthController::class,'register'])->name('register');
Route::post('register', [AuthController::class,'custom_register'])->name('custom-register');

Route::get('login', [AuthController::class,'login'])->name('login');
Route::post('login', [AuthController::class,'custom_login'])->name('custom-login');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [PageController::class,'index'])->name('home');
    Route::get('about', [PageController::class,'about'])->name('about');
    Route::get('contact', [PageController::class,'contact'])->name('contact');
    Route::post('contact', [PageController::class,'inquiry'])->name('inquiry');
    Route::get('orders', [PageController::class,'orders'])->name('orders');
    Route::get('profile/update', [ProfileController::class,'profile'])->name('profile');
    Route::post('profile/update', [ProfileController::class,'update_profile'])->name('update-profile');
    Route::get('category/{slug}', [PageController::class,'category'])->name('category');
    Route::get('products', [FrontProductController::class,'product_list'])->name('product-list');
    Route::get('product/{slug}', [FrontProductController::class,'product_details'])->name('product-details');
    Route::get('search', [FrontProductController::class, 'search_page'])->name('search-page');
    Route::post('search', [FrontProductController::class, 'search_products'])->name('search-products');
    Route::post('add-to-wishlist', [FrontOrderController::class, 'add_to_wishlist'])->name('add-to-wishlist');
    Route::post('add-to-cart', [FrontOrderController::class, 'add_to_cart'])->name('add-to-cart');
    Route::get('wishlist', [FrontOrderController::class, 'wishlist'])->name('wishlist');
    Route::get('wishlist/delete/{id}', [FrontOrderController::class, 'delete'])->name('wishlist.delete');
    Route::get('wishlist/delete-all', [FrontOrderController::class, 'deleteAll'])->name('wishlist.deleteAll');
    Route::get('cart', [FrontOrderController::class, 'cart'])->name('cart');
    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::get('/', [HomeController::class,'index'])->name('home');
        Route::resource('categories', CategoryController::class)->except('show')->names('categories');
        Route::resource('products', ProductController::class)->except('show')->names('products');
        Route::resource('users', UserController::class)->only(['index','destroy'])->names('users');
        Route::resource('inquiries', InquiryController::class)->only(['index','destroy'])->names('inquiries');
    });
});
