<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
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

// category route

Route::resource('/category',CategoryController::class);

// brand route

Route::resource('/brand',BrandController::class);
Route::get('/brand/details/{id}', [BrandController::class, 'details'])->name('brand.details');

// product route

Route::resource('/product', ProductController::class );
Route::get('/product/details/{id}', [ProductController::class, 'details'])->name('product.details');

