<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ResetPasswordController;

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

// Welcome page
Route::get('/', [AuthController::class, 'Welcome'])->name('welcome');

/* Authentication */
// Login
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login-custom', [AuthController::class, 'LoginCustom'])->name('login.custom');

// Register
Route::get('/register', [AuthController::class, 'Register'])->name('register');
Route::post('/register-custom', [AuthController::class, 'RegisterCustom'])->name('register.custom');

// Logout
Route::get('/logout', [AuthController::class, 'Logout'])->name('logout');

// Forget and Reset Password
Route::get('/forget-password', [AuthController::class, 'showForgetPasswordForm'])->name('password.request');
Route::post('/forget-password', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/recovery-email-sent', function () {
    return view('auth.recovery');
});
Route::get('/reset-password/{token}', function ($token) {
    return view('auth.passwords.reset', ['token' => $token]);
})->name('passwords.reset');
Route::post('/reset-password', function (Illuminate\Http\Request $request) {
    return redirect('/login')->with('status', 'Password has been reset!');
})->name('password.update');

/* Issues */
// View specific issue
Route::get('/issues/{id}', [IssueController::class, 'show'])->name('issues.show');
// Update Issue Status
Route::post('/issues/update/{id}', [IssueController::class, 'UpdateIssueStatus'])->name('issues.update');

/* Reports */
// Previous Reports
Route::get('/reports', [ReportController::class, 'index'])->name('report');
// See more page (from Previous report page)
Route::get('/report/{id}', [ReportController::class, 'show'])->name('report.show');

/* Dashboards */
// Student Dashboard
Route::get('/student/dashboard', [DashboardController::class, 'index'])->name('student.dashboard');
