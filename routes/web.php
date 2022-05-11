<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewController;
use App\Http\Controllers\HomePageController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('homepage', [HomePageController::class, 'index'])->name('homepage.index');

Route::resource('categories',CategoryController::class);

Route::resource('news', NewController::class);

