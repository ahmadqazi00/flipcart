<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public & Product Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [ProductController::class, 'getProducts']);
Route::get('/category/{category}', [ProductController::class, 'getreleventProducts']);
Route::get('/checkout/{id}', [ProductController::class, 'getSingleProduct']);

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/
Route::view('/signup', 'signup');
Route::view('/login', 'login');
Route::post('/signup', [UserController::class, 'register']);
Route::post('/signin', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'signOut']);

/*
|--------------------------------------------------------------------------
| Cart Routes
|--------------------------------------------------------------------------
*/
Route::get('/addition', [CartController::class, 'getCartData'])->middleware('auth');
Route::post('/shop', [CartController::class, 'AddToCart']);

// NEW: Remove item from cart route (Blade file ka DELETE form is handle hoga)
Route::delete('/cart/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');

/*
|--------------------------------------------------------------------------
| Order & Checkout Routes
|--------------------------------------------------------------------------
*/
Route::post('/order', [CartController::class, 'order'])->name('order.store');
Route::view('/order', 'pages.users.final-page');
Route::get('/proceed', [OrderController::class, 'getMyOrders']);
Route::post('/add-shipping', [OrderController::class, 'addShippingAddress']);
Route::view('/proceed', 'pages.seller.proceed-out');

/*
|--------------------------------------------------------------------------
| Seller Routes
|--------------------------------------------------------------------------
*/
Route::prefix('/seller')->group(function () {
    Route::view('/dashboard', 'pages.seller.dashboard')->name('seller-dashboard');
    Route::post('/add-product', [ProductController::class, 'addProduct']);
});