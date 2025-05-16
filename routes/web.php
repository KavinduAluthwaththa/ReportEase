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

Route::post('/login-custom',[AuthController::class, 'LoginCustom'])->name('login.custom');
Route::post('/register-custom',[AuthController::class, 'RegisterCustom'])->name('register.custom');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register2', [AuthController::class, 'Register2'])->name('register2');
Route::post('/register', [AuthController::class, 'RegisterCustom'])->name('register');
Route::get('/register', [AuthController::class, 'Register'])->name('register');
