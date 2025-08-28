<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\ReportController;
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

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

// Home page - redirects to issues view
Route::get('/', function () {
    return view('shared.viewissues');
})->name('home');

// Welcome page
Route::get('/welcome', [AuthController::class, 'Welcome'])->name('welcome');

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

// Login routes
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login-custom', [AuthController::class, 'LoginCustom'])->name('login.custom');

// Register routes
Route::get('/register', [AuthController::class, 'Register'])->name('register');
Route::post('/register-custom', [AuthController::class, 'RegisterCustom'])->name('register.custom');

// Logout route
Route::get('/logout', [AuthController::class, 'Logout'])->name('logout');

// Password reset routes
Route::get('/forget-password', [AuthController::class, 'showForgetPasswordForm'])->name('password.request');
Route::post('/forget-password', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');

/*
|--------------------------------------------------------------------------
| Issue Management Routes
|--------------------------------------------------------------------------
*/

// View specific issue
Route::get('/issues/{id}', [IssueController::class, 'show'])->name('issues.show');

// Update issue status
Route::post('/issues/update/{id}', [IssueController::class, 'UpdateIssueStatus'])->name('issues.update');

/*
|--------------------------------------------------------------------------
| Report Routes
|--------------------------------------------------------------------------
*/

// View specific report details
Route::get('/report/{id}', [ReportController::class, 'show'])->name('report.show');

