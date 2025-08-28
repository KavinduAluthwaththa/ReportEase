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

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

// Welcome/Landing Page
Route::get('/', [AuthController::class, 'Welcome'])->name('welcome');

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

// Login Routes
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login-custom', [AuthController::class, 'LoginCustom'])->name('login.custom');

// Registration Routes
Route::get('/register', [AuthController::class, 'Register'])->name('register');
Route::post('/register-custom', [AuthController::class, 'RegisterCustom'])->name('register.custom');
Route::get('/register2', [AuthController::class, 'Register2'])->name('register2');
Route::post('/register2-custom', [AuthController::class, 'Register2Custom'])->name('register2.custom');

// Logout Route
Route::get('/logout', [AuthController::class, 'Logout'])->name('logout');

// Password Reset Routes
Route::get('/forget-password', [AuthController::class, 'showForgetPasswordForm'])->name('password.request');
Route::post('/forget-password', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/recovery-email-sent', function () {
    return view('auth.recovery');
})->name('recovery.email.sent');

Route::get('/reset-password/{token}', function ($token) {
    return view('auth.passwords.reset', ['token' => $token]);
})->name('passwords.reset');

Route::post('/reset-password', function (Illuminate\Http\Request $request) {
    // Password reset logic should be implemented here
    return redirect('/login')->with('status', 'Password has been reset!');
})->name('password.update');

// Development route for direct access to reset password page
Route::get('/reset-password-dev', function () {
    return view('auth.passwords.reset', ['token' => null]);
})->name('password.reset.dev');

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
*/

// Student Dashboard
Route::get('/student/dashboard', [DashboardController::class, 'index'])->name('student.studash');

// Faculty Staff Dashboard
Route::get('/facultystaff/dashboard', function () {
    return view('facultystaff.fsdash');
})->name('facultystaff.dashboard');

// Maintenance Department Dashboard
Route::get('/maintenancedep/dashboard', function () {
    return view('maintenancedep.maintenancedepdash');
})->name('maintenancedep.dashboard');

/*
|--------------------------------------------------------------------------
| Issue Management Routes
|--------------------------------------------------------------------------
*/

// View specific issue
Route::get('/issues/{id}', [IssueController::class, 'show'])->name('issues.show');

// Update Issue Status
Route::post('/issues/update/{id}', [IssueController::class, 'UpdateIssueStatus'])->name('issues.update');

// Issues Index/List
Route::get('/issues/all', function () {
    return view('issues.index');
})->name('issues.all');

/*
|--------------------------------------------------------------------------
| Report Management Routes
|--------------------------------------------------------------------------
*/

// Previous Reports
Route::get('/reports', [ReportController::class, 'index'])->name('report');
Route::get('/report/{id}', [ReportController::class, 'show'])->name('report.show');

// Alternative Previous Reports Route
Route::get('/previous-reports', function () {
    $reports = [
        (object)['id' => 1, 'title' => 'Report 1'],
        (object)['id' => 2, 'title' => 'Report 2'],
    ];
    return view('previous-report.previousReport', compact('reports'));
})->name('previous.reports');

/*
|--------------------------------------------------------------------------
| View Routes (Static/Demo Pages)
|--------------------------------------------------------------------------
*/

// Main View Issues (with sample data)
Route::get('/main/viewissues', function () {
    $issue = (object)[
        'issue_id' => 'T001',
        'title' => 'Projector in the NLH is not working',
        'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s',
        'location' => 'NLH',
        'status' => 'pending',
        'reported_at' => now(),
        'user' => (object)[
            'full_name' => 'Samanalee Fernando',
            'email' => 'samanalee@gmail.com',
            'ID' => '21CIS004',
            'role' => (object)[
                'role_name' => 'Student'
            ]
        ]
    ];
    return view('main.viewissues', compact('issue'));
})->name('main.viewissues');

// Shared View Issues (with sample data)
Route::get('/shared/viewissues', function () {
    $issue = (object)[
        'issue_id' => 'T001',
        'title' => 'Projector in the NLH is not working',
        'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s',
        'location' => 'NLH',
        'status' => 'pending',
        'reported_at' => now(),
        'user' => (object)[
            'full_name' => 'Samanalee Fernando',
            'email' => 'samanalee@gmail.com',
            'ID' => '21CIS004',
            'role' => (object)[
                'role_name' => 'Student'
            ]
        ]
    ];
    return view('shared.viewissues', compact('issue'));
})->name('shared.viewissues');
