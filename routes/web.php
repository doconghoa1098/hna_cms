<?php

use App\Http\Controllers\CategoryController;
use App\Models\News;
use App\Models\User;
use App\Http\Controllers\NewController;
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

Route::get('/', function () {
    $news = News::orderByDesc('id')->paginate(10);
    $users = User::orderByDesc('id')->paginate(10);

    return view('welcome', compact('news', 'users'));
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('verified')->name('home');

Route::resource('users', UserController::class)->middleware('verified');


