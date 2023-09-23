<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\PostController;

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
    return view("user.login");
});

Route::get('/login',[UserAuthController::class, 'login']);
Route::get('/registration',[UserAuthController::class, 'registration']);
Route::post('/register-user',[UserAuthController::class, 'registerUser'])->name('register-user');
Route::post('/login-user',[UserAuthController::class, 'loginUser'])->name('login-user');

Route::get('/posts',[UserAuthController::class, 'blogPost']);
Route::post('/bloger-post',[UserAuthController::class, 'blogerPost'])->name('bloger-post');
Route::get('/showPost',[UserAuthController::class, 'showPost']);