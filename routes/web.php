<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('category/details/{id}', [CategoryController::class, 'details'])->name('category.details');
Route::get('/brand/details/{id}', [BrandController::class, 'details'])->name('brand.details');
Route::get('/product/details/{id}', [ProductController::class, 'details'])->name('product.details');
Route::get('/product/all', [ProductController::class, 'allProduct'])->name('product.all');
Route::get('/category/all', [CategoryController::class, 'allCategory'])->name('category.all');
Route::get('/brand/all', [BrandController::class, 'allBrand'])->name('brand.all');
Route::post('/add-to-cart',[ProductController::class, 'addToCart'])->name('addToCart');
Route::get('/view-cart',[ProductController::class, 'viewCart'])->name('viewCart');
Route::get('/remove-cart/{id}',[ProductController::class, 'removeCart'])->name('removeCart');


Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');

    // category route
    Route::resource('/category',CategoryController::class);

    // brand route
    Route::resource('/brand',BrandController::class);

    // product route
    Route::resource('/product', ProductController::class );
});
