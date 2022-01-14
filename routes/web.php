<?php

use App\Http\Controllers\HomePage;
use App\Http\Controllers\News;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Relations;

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
Auth::routes();
// Route::get('/',[Relations::class,'posterName']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/',[HomePage::class,'index']);
Route::get('/',[News::class,'index']);
Route::get('/news/create',[News::class,'create'])->middleware('auth');
Route::post('/news',[News::class,'store']);
Route::get('/news/{id}',[News::class,'show']);
Route::get('/news/edit/{id}',[News::class,'edit'])->middleware('auth');
Route::put('/news',[News::class,'update'])->middleware('auth');
Route::get('/news/delete/{id}',[News::class,'destroy']);
