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
    return view('./main/viewissues');
});

/*Authentication*/

//Login
Route::get('/login', [AuthController::class, 'login'])->name('login'); /*View Login*/
Route::post('/login-custom',[AuthController::class, 'LoginCustom'])->name('login.custom'); /*Login Function*/

//register
Route::get('/register', [AuthController::class, 'Register'])->name('register'); /*View Register*/
Route::post('/register-custom',[AuthController::class, 'RegisterCustom'])->name('register.custom'); /*Register Function*/

//logout
Route::get('/logout', [AuthController::class, 'Logout'])->name('logout');

// Forget Password - Show form
Route::get('/forget-password', [AuthController::class, 'showForgetPasswordForm'])->name('password.request');
//welcomepage
Route::get('/welcome', [AuthController::class, 'Welcome'])->name('welcome');


// Forget Password - Handle submission
Route::post('/forget-password', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');

// Password reset link sent page
Route::get('/password/sent', [AuthController::class, 'passwordSent'])->name('password.sent');
