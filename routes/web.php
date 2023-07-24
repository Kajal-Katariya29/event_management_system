<?php

use App\Http\Controllers\auth\AuthController;
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

Route::get('/login', function () {
    return view('welcome');
});

Route::get('/login',[AuthController::class,'index'])->name('login');
Route::post('/post-login',[AuthController::class,'postLogin'])->name('login.post');
Route::get('/registration',[AuthController::class,'registration'])->name('register');
Route::post('/post-registration',[AuthController::class,'postRegistration'])->name('register.post');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');


