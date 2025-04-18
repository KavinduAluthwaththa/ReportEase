<![CDATA<?php

use App\Http\Controllers\AuthController;
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
    return view('welcome');
});

Route::get('/register',[AuthController::class, 'Register'])->name('Register');
Route::get('/login',[AuthController::class, 'Login'])->name('Login');
Route::get('/login-custom',[AuthController::class, 'LoginCustom'])->name('login.custom');
Route::get('/register-custom',[AuthController::class, 'RegisterCustom'])->name('register.custom');
