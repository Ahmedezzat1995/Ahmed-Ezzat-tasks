<?php

use App\Http\Controllers\products\ProductsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('dashboard');
});

Route::get('products/index',[ProductsController::class,'index'])->name('products.index') ;
Route::get('products/create',[ProductsController::class,'create'])->name('products.create') ;
Route::get ('products/edit/{id}',[ProductsController::class,'edit'])->name('products.edit');
Route::post ('products.store',[ProductsController::class,'store'])->name('products.store');
Route::put ('products/update/{id}',[ProductsController::class,'update'])->name('products.update');
Route::delete ('products/destroy/{id}',[ProductsController::class,'destroy'])->name('products.destroy');
