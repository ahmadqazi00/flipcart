<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::view('/','welcome');
Route::view('/category/{category}','pages.users.category-page');
Route::view('/checkout/{id}','pages.users.checkout');

// Authentication
Route::view('/signup','signup');
Route::view('/login','login');





Route::get('/',[Productcontroller::class,'getProducts']);
Route::get('/category/{category}',[ProductController::class,'getreleventProducts']);
Route::get('/checkout/{id}',[ProductController::class,'getSingleProduct']);


Route::post('/signup',[UserController::class,'register']);
Route::post('/signin',[UserController::class,'Login']);
Route::post('logout',[UserController::class,'signOut']);


Route::prefix('/seller')->group(function(){
Route::view('/dashboard','pages.seller.dashboard')->name('seller-dashboard');

Route::post('/add-product',[ProductController::class,'addProduct']);

});