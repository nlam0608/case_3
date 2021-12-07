<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\BillController;



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


Route::get('/login', [LoginController::class, 'index'])->name("ShowFormLogin");
Route::post('/login', [LoginController::class, 'login'])->name("CheckLogin");
Route::get('/logout', [LoginController::class, 'logout'])->name("Logout");


Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('master');
    })->name('home.master');
    Route::prefix('admin')->group(function () {
        Route::prefix('products')->group(function () {
            Route::get('/', [ProductController::class, 'index'])->name('products.index');
            Route::get('/create', [ProductController::class, 'create'])->name('products.create');
            Route::post('/create', [ProductController::class, 'store'])->name('products.store');
            Route::get('/{id}/update', [ProductController::class, 'edit'])->name('products.edit');
            Route::post('/{id}/update', [ProductController::class, 'update'])->name('products.update');
            Route::get('/{id}/delete', [ProductController::class, 'destroy'])->name('products.delete');
            Route::get('/search', [ProductController::class, 'search'])->name('products.search');
        });
        Route::prefix('cart')->group(function () {
            Route::get('/', [CartController::class, 'index'])->name('cart.index');
            Route::get('/{idProduct}/add-to-cart', [CartController::class, 'addToCart'])->name('cart.addToCart');
            Route::get('/{index}/remove', [CartController::class, 'remove'])->name('cart.remove');
        });
        Route::prefix('bill')->group(function(){
            Route::get('/', [BillController::class, 'index'])->name('bill.index');
            Route::post('/store', [BillController::class, 'createBill'])->name('bill.createBill');
        });
        Route::prefix('orders')->group(function () {
            Route::get('/', [OrderController::class, 'index'])->name('orders.index');
        });
        Route::prefix('changeLogin')->group(function () {
            Route::get('change-password', [LoginController::class, 'showFormPassword'])->name('users.showPassword');
            Route::post('change-password', [LoginController::class, 'changePassword'])->name('change.password');
        });
        Route::prefix('categories')->group(function () {
            Route::get('/', [CategoriesController::class, 'index'])->name('categories.index');
            Route::get('/create', [CategoriesController::class, 'create'])->name('categories.create');
            Route::post('/create', [CategoriesController::class, 'store'])->name('categories.store');
            Route::get('/{id}/update', [CategoriesController::class, 'edit'])->name('categories.edit');
            Route::post('/{id}/update', [CategoriesController::class, 'update'])->name('categories.update');
            Route::get('/{id}/delete', [CategoriesController::class, 'destroy'])->name('categories.destroy');
        });
    });
});
