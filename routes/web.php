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


// View specific issue
Route::get('/issues/{id}', [IssueController::class, 'show'])->name('issues.show');

/*Authentication*/

//Login
Route::get('/login', [AuthController::class, 'login'])->name('login'); /*View Login*/
Route::post('/login-custom',[AuthController::class, 'LoginCustom'])->name('login.custom'); /*Login Function*/

//register
Route::get('/register', [AuthController::class, 'Register'])->name('register'); /*View Register*/
Route::post('/register-custom',[AuthController::class, 'RegisterCustom'])->name('register.custom'); /*Register Function*/

//register2
Route::get('/register2', [AuthController::class, 'Register2'])->name('register2'); /*View Register2*/
Route::post('/register2-custom',[AuthController::class, 'Register2Custom'])->name('register2.custom'); /*Register2 Function*/

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

//recovery --- Harishian
Route::get('/recovery-email-sent', function () {
    return view('auth.recovery');
});

//reset password --- Pasindi
Route::get('/reset-password/{token}', function ($token) {
    return view('auth.passwords.reset', ['token' => $token]);
})->name('passwords.reset');

// Development route for direct access to reset password page
Route::get('/reset-password-dev', function () {
    return view('auth.passwords.reset', ['token' => null]);
})->name('password.reset.dev');

// Add this POST route for password update
Route::post('/reset-password', function (Illuminate\Http\Request $request) {
    // Here you should add password reset logic
    // For now, just return a simple response or redirect
    return redirect('/login')->with('status', 'Password has been reset!');
})->name('password.update');

// Student Dashboard --- Kaveeshi
Route::get('/student/dashboard', [DashboardController::class, 'index'])->name('student.studash');

// Faculty Staff Dashboard
Route::get('/facultystaff/dashboard', function () {
    return view('facultystaff.fsdash');
})->name('facultystaff.dashboard');

// Main View Issues
Route::get('/main/viewissues', function () {
    $issue = (object)[
        'id' => 'T001',
        'title' => 'Projector in the NLH is not working',
        'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s',
        'reporter_name' => 'Samanalee Fernando',
        'reporter_email' => 'samanalee@gmail.com',
        'student_id' => '21CIS004',
        'created_at' => now(),
        'status' => 'Faculty Administration',
        'location' => 'NLH',
        'reporter_role' => 'Student'
    ];
    return view('main.viewissues', compact('issue'));
})->name('main.viewissues');

// Issues Index
Route::get('/issues/all', function () {
    return view('issues.index');
})->name('issues.all');

// Maintenance Department Dashboard
Route::get('/maintenancedep/dashboard', function () {
    return view('maintenancedep.maintenancedepdash');
})->name('maintenancedep.dashboard');

// Previous Reports
Route::get('/previous-reports', function () {
    $reports = [
        (object)['id' => 1, 'title' => 'Report 1'],
        (object)['id' => 2, 'title' => 'Report 2'],
    ];
    return view('previous-report.previousReport', compact('reports'));
})->name('previous.reports');

// Shared View Issues
Route::get('/shared/viewissues', function () {
    $issue = (object)[
        'id' => 'T001',
        'title' => 'Projector in the NLH is not working',
        'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s',
        'reporter_name' => 'Samanalee Fernando',
        'reporter_email' => 'samanalee@gmail.com',
        'student_id' => '21CIS004',
        'created_at' => now(),
        'status' => 'Faculty Administration',
        'location' => 'NLH',
        'reporter_role' => 'Student'
    ];
    return view('shared.viewissues', compact('issue'));
})->name('shared.viewissues');
