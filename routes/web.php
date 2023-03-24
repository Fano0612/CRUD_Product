<?php

use App\Http\Controllers\ProductListController;
use App\Http\Controllers\ProductCloneController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductManagementController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/mainpage', function () {
    return view('mainpage');
})->name('mainpage');

Route::get('/productlist', [ProductListController::class, 'index'])->name('productlist');





Route::get('/product_menu', [ProductManagementController::class, 'index'])->name('product_menu');
Route::post('/insertproduct', [ProductManagementController::class, 'insertproduct'])->name('insertproduct');
Route::get('/showproduct/{product_id}', [ProductManagementController::class, 'showproduct'])->name('showproduct');
Route::post('/editproduct/{product_id}', [ProductManagementController::class, 'editproduct'])->name('editproduct');
Route::get('/deleteproduct/{product_id}', [ProductManagementController::class, 'deleteproduct'])->name('deleteproduct');


Route::get('register', [UserController::class, 'register'])->name('register');
Route::POST('register', [UserController::class, 'registeracc'])->name('registeracc');
Route::get('login', [UserController::class, 'login'])->name('login');
Route::POST('login', [UserController::class, 'loginacc'])->name('loginacc');
Route::get('logout', [UserController::class, 'logout'])->name('logout');
Route::get('AccountExist', [UserController::class, 'AccountExist'])->name('AccountExist');
Route::get('AccountUnexist', [UserController::class, 'AccountUnexist'])->name('AccountUnexist');


Route::get('/category', [ProductCategoryController::class, 'create'])->name('category');
Route::post('/category', [ProductCategoryController::class, 'store'])->name('category.store');
Route::get('/category/{id}', [ProductCategoryController::class, 'show'])->name('category.show');
Route::get('/category/{id}/edit', [ProductCategoryController::class, 'edit'])->name('category.edit');
Route::post('/category/{id}', [ProductCategoryController::class, 'update'])->name('category.update');
Route::delete('/category/{id}', [ProductCategoryController::class, 'destroy'])->name('category.destroy');


Route::get('/cart', [ProductCloneController::class, 'index'])->name('cart.index');
Route::get('/cart/{id}', [ProductCloneController::class, 'showdata'])->name('cart.showdata');
Route::post('/cart/clone', [ProductCloneController::class, 'clone'])->name('cart.clone');
Route::delete('/deletion/{id}', [ProductCloneController::class, 'deletion'])->name('deletion');





