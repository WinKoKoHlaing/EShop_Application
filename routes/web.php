<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\WishlistController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/* ------- frontend ------- */
Route::get('/',[FrontendController::class,'index']);
Route::get('category',[FrontendController::class,'category']);
Route::get('category/{slug}',[FrontendController::class,'categoryView']);
Route::get('category/{c_slug}/{p_slug}',[FrontendController::class,'productView']);

Auth::routes();

// counting cart & wishlist
Route::get('load-cart-count',[CartController::class,'cartcount']);
Route::get('load-wishlist-count',[WishlistController::class,'wishlistcount']);

// add-to-cart
Route::post('add-to-cart',[CartController::class,'addToCart']);
Route::post('cart-item-remove',[CartController::class,'removeCart']);
Route::post('cart-item-update',[CartController::class,'updateCart']);

// add-to-wishlist
Route::post('add-to-wishlist',[WishlistController::class,'addToWishlist']);
Route::post('wishlist-item-remove',[WishlistController::class,'removeWishlist']);



// authenicated process
Route::middleware(['auth'])->group(function () {
    Route::get('cart',[CartController::class,'viewCart']);
    Route::get('checkout',[CheckoutController::class,'checkout']);
    Route::post('place-order',[CheckoutController::class,'placeorder']);
    
    Route::get('my-order',[UserController::class,'myorder']);
    Route::get('my-order/{id}',[UserController::class,'myorderView']);
    
    Route::get('wishlist',[WishlistController::class,'viewWishlist']);
});


/* ------- backend ------- */
Route::middleware(['auth', 'isAdmin'])->prefix('admin')->group(function () {
    //dashboard
    Route::get('dashboard',[DashboardController::class, 'dashboard'])->name('dashboard');

    //caegory
    Route::resource('category',CategoryController::class);

    //product
    Route::resource('product',ProductController::class);

    //order
    Route::get('order',[OrderController::class,'index'])->name('order');
    Route::get('order-view/{id}',[OrderController::class,'orderview'])->name('order-view');
    Route::put('order-update/{id}',[OrderController::class,'orderupdate'])->name('order-update');
    Route::get('order-history',[OrderController::class,'orderhistory'])->name('order-history');

    //user
    Route::get('users',[DashboardController::class,'index'])->name('users');
    Route::get('users-view/{id}',[DashboardController::class,'view'])->name('users-view');
});

