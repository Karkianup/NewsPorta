<?php

use App\Http\Controllers\HomePage;
use App\Http\Controllers\News;
use App\Http\Controllers\NewsCategory;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/display/category',[NewsCategory::class,'category']);
Route::get('/',[HomePage::class,'index']);
Route::post('/news',[News::class,'store'])->middleware('auth');
Route::get('/news/{id}',[News::class,'show']);
Route::get('/news/edit/{id}',[News::class,'edit'])->middleware('auth');
Route::put('/news',[News::class,'update'])->middleware('auth');
Route::get('/news/delete/{id}',[News::class,'destroy'])->middleware('auth');

// Route::get('/user/dashboard',[DashboardController::class,'dashboardView'])->middleware('auth');

// Route::view('/sidebar','layouts.sidebar');
Route::group(['prefix'=>'/user/dashboard'],function(){
    Route::get('/posts',[DashboardController::class,'myPosts'])->name('posts')->middleware('auth');
    Route::get('/create',[News::class,'create'])->middleware('auth');
});
Route::get('/user/profile',[DashboardController::class,'show'])->middleware('auth');


// Route::view('/index','index');
Route::post('/comment',[CommentController::class,'store']);

Route::view('/rich/text','layouts.richtexteditor');
