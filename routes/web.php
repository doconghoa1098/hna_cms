<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\NewController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\MakerController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;

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

Auth::routes(['verify' => true]);

Route::prefix('/')->middleware('verified')->group(function() {

    Route::get('/', [HomePageController::class, 'index'])->name('homepage.index');

    Route::resource('categories', CategoryController::class);
    
    Route::resource('news', NewController::class)->middleware('authorization:Admin');
    
    Route::resource('products', ProductController::class);
    
    Route::resource('users', UserController::class)->middleware('authorization:Admin');
    
    Route::resource('makers', MakerController::class);
    
    Route::post('upload', [ContentController::class, 'upload'])->name('upload');

    Route::get('logout',[LoginController::class,'logout'])->name('logoutUser');
});
