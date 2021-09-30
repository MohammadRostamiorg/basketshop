<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SalesController;
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
// product routes
Route::get('/', [ProductController::class,'index'])->middleware('auth');
Route::delete('/prducts/{id}',[ProductController::class,'destroy'])->name('destroy')->middleware('auth');
Route::get('products/create',[ProductController::class,'create'])->name('create')->middleware('auth');
Route::post('products/store',[ProductController::class,'store'])->name('store')->middleware('auth');
Route::get('products/{id}/edit',[ProductController::class,'edit'])->name('edit')->middleware('auth');
Route::put('products/update/{id}',[ProductController::class,'update'])->name('update')->middleware('auth');


// sales routes
Route::get('add/{id}',[SalesController::class,'addPage'])->name('addPage')->middleware('auth');
Route::post('add',[SalesController::class,'add'])->name('add')->middleware('auth');


Auth::routes();

Route::get('/home', [ProductController::class, 'index'])->name('home');
