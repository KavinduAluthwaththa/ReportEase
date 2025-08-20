<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IssueController;
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


// View specific issue
Route::get('/issues/{id}', [IssueController::class, 'show'])->name('issues.show');

/*Authentication*/

//Login
Route::get('/login', [AuthController::class, 'login'])->name('login'); /*View Login*/
Route::post('/login-custom',[AuthController::class, 'LoginCustom'])->name('login.custom'); /*Login Function*/

//register
Route::get('/register', [AuthController::class, 'Register'])->name('register'); /*View Register*/
Route::post('/register-custom',[AuthController::class, 'RegisterCustom'])->name('register.custom'); /*Register Function*/

//logout
Route::get('/logout', [AuthController::class, 'Logout'])->name('logout');

/*Issues*/

//Update Issue Status
Route::post('/issues/update/{id}', [IssueController::class, 'UpdateIssueStatus'])->name('issues.update');
// Forget Password - Show form
Route::get('/forget-password', [AuthController::class, 'showForgetPasswordForm'])->name('password.request');
//welcomepage
Route::get('/', [AuthController::class, 'Welcome'])->name('welcome');

//Previous Reports
Route::get('/reports', [ReportController::class, 'index'])->name('report');

//See more page (from Previous report page)
Route::get('/report/{id}', [ReportController::class, 'show'])->name('report.show');

// Forget Password - Handle submission
Route::post('/forget-password', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');

//recovery
Route::get('/recovery-email-sent', function () {
    return view('auth.recovery');
});

//reset password
Route::get('/reset-password/{token}', function ($token) {
    return view('auth.passwords.reset', ['token' => $token]);
})->name('passwords.reset');

// Add this POST route for password update
Route::post('/reset-password', function (Illuminate\Http\Request $request) {
    // Here you should add password reset logic
    // For now, just return a simple response or redirect
    return redirect('/login')->with('status', 'Password has been reset!');
})->name('password.update');

